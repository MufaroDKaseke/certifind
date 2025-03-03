<?php


class Services extends Database {

  public function __construct() {

    parent::__construct();
  }

  // Search services
  public function search($searchQuery) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT p.*, 
                                                  COALESCE(AVG(r.rating), 0) AS avg_rating 
                                            FROM providers p 
                                            LEFT JOIN reviews r ON p.provider_id = r.provider_id 
                                            WHERE p.name LIKE CONCAT('%', ? ,'%') 
                                              OR p.category LIKE CONCAT('%', ? ,'%') 
                                              OR p.address LIKE CONCAT('%', ? ,'%') 
                                            GROUP BY p.provider_id;");
    mysqli_stmt_bind_param($stmt, 'sss', $searchQuery, $searchQuery, $searchQuery);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $services;
  }

  // Get a single service by provider_id
  public function getServiceByProviderId($providerId) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT p.*, 
                                                  COALESCE(ROUND(AVG(r.rating), 1), 0) AS avg_rating 
                                            FROM providers p
                                            LEFT JOIN reviews r ON p.provider_id = r.provider_id 
                                            WHERE p.provider_id = ? 
                                            GROUP BY p.provider_id;
                                            ");
    mysqli_stmt_bind_param($stmt, 'i', $providerId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $service = mysqli_fetch_assoc($result);

    $this->close();
    return $service;
  }

  // Get nearest services
  public function getNearestServices($userLat, $userLong, $limit = 20) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT p.provider_id, 
                            p.name, 
                            p.category, 
                            p.location, 
                            p.primary_email, 
                            p.verified, 
                            p.address, 
                            COALESCE(ROUND(AVG(r.rating), 1), 0) AS avg_rating, 
                            ROUND((6371 * ACOS(COS(RADIANS(?)) * COS(RADIANS(SUBSTRING_INDEX(p.location, ',', 1))) 
                            * COS(RADIANS(SUBSTRING_INDEX(p.location, ',', -1)) - RADIANS(?)) 
                            + SIN(RADIANS(?)) * SIN(RADIANS(SUBSTRING_INDEX(p.location, ',', 1))))), 2) 
                            AS distance 
                        FROM providers p
                        LEFT JOIN reviews r ON p.provider_id = r.provider_id 
                        GROUP BY p.provider_id, p.name, p.category, p.location, p.primary_email, 
                            p.verified, p.address 
                        ORDER BY distance
                        LIMIT ?;
                        ");

    mysqli_stmt_bind_param($stmt, 'dddd', $userLat, $userLong, $userLat, $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $services;
  }
  // Get services by category
  public function getServicesByCategory($category) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM providers WHERE category = ?");
    mysqli_stmt_bind_param($stmt, 's', $category);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $services;
  }

  // Get services by nearest within category
  public function getNearestServicesByCategory($userLat, $userLong, $category) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn,    "SELECT p.provider_id, 
                                                      p.name, 
                                                      p.category, 
                                                      p.location, 
                                                      p.primary_email, 
                                                      p.verified, 
                                                      p.address, 
                                                      COALESCE(ROUND(AVG(r.rating), 1), 0) AS avg_rating, 
                                                      ROUND((6371 * ACOS(COS(RADIANS(?)) * COS(RADIANS(SUBSTRING_INDEX(p.location, ',', 1))) 
                                                      * COS(RADIANS(SUBSTRING_INDEX(p.location, ',', -1)) - RADIANS(?)) 
                                                      + SIN(RADIANS(?)) * SIN(RADIANS(SUBSTRING_INDEX(p.location, ',', 1))))), 2) 
                                                      AS distance 
                                                FROM providers p
                                                LEFT JOIN reviews r ON p.provider_id = r.provider_id 
                                                WHERE p.category = ? 
                                                GROUP BY p.provider_id, p.name, p.category, p.location, p.primary_email, 
                                                        p.verified, p.address 
                                                ORDER BY distance;
                                                ");

    mysqli_stmt_bind_param($stmt, 'ddds', $userLat, $userLong, $userLat, $category);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $services;
  }
}
