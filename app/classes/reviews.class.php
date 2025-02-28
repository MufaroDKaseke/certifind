<?php


class Reviews extends Database {
  public function __construct() {
    parent::__construct();
  }

  // View reviews by provider
  public function getReviewsByProvider($providerId) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM reviews WHERE provider_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $providerId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $reviews;
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