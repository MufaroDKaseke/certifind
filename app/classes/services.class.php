<?php


class Services extends Database {

  public function __construct() {

    parent::__construct();
  }

  // Search services
  public function search($searchQuery) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM providers WHERE name LIKE ? OR category LIKE ? OR address LIKE ?");
    mysqli_stmt_bind_param($stmt, 'sss', $searchQuery, $searchQuery, $searchQuery);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $services;
    
  }

  // Get nearest services
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

    $stmt = mysqli_prepare($this->db_conn,    "SELECT provider_id, name, category, location, primary_email, verified, address, 
                                                    ROUND((6371 * acos(cos(radians(?)) * cos(radians(SUBSTRING_INDEX(location, ',', 1))) 
                                                    * cos(radians(SUBSTRING_INDEX(location, ',', -1)) - radians(?)) 
                                                    + sin(radians(?)) * sin(radians(SUBSTRING_INDEX(location, ',', 1))))), 2)
                                                    AS distance 
                                              FROM providers 
                                              WHERE category = ? 
                                              ORDER BY distance");

    mysqli_stmt_bind_param($stmt, 'ddds', $userLat, $userLong, $userLat, $category);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $services;
  }
  
  // Give a service a rating
  public function newReview($providerId, $comment, $rating) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "INSERT user_id, provider_id, rating, comment INTO reviews VALUES(?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iiis', $_SESSION['user_id'], $providerId, $rating, $comment);
    $result = mysqli_stmt_execute($stmt);
    $this->close();
    return $result;
  }
}