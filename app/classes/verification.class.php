<?php

class Verification extends Database {
    private $provider_id;

    public function __construct($provider_id) {
        parent::__construct();
        $this->provider_id = $provider_id;
    }

    // Get verification status
    public function getStatus() {
        $this->connect();
        
        $stmt = mysqli_prepare($this->db_conn, 'SELECT verified FROM providers WHERE provider_id = ?');
        mysqli_stmt_bind_param($stmt, 's', $this->provider_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        return $user ? $user['verified'] : false;
    }

    // Get verification requests
    public function getRequests() {
        $this->connect();

        $stmt = mysqli_prepare($this->db_conn, 'SELECT * FROM verifications WHERE provider_id = ? ORDER BY status DESC, requested_on DESC');
        mysqli_stmt_bind_param($stmt, 's', $this->provider_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        $requests = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $document_count = 0;
            if ($row['doc_1']) $document_count++;
            if ($row['doc_2']) $document_count++;
            if ($row['doc_3']) $document_count++;
            $row['document_count'] = $document_count;
            $requests[] = $row;
        }

        return $requests;
    }

    // Submit verification request
    public function submitRequest($files) {
        $this->connect();
        
        // Process file uploads
        $uploadedFiles = [];
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/certifind/uploads/verification/';
        
        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Process each document
        foreach (['document1', 'document2', 'document3'] as $index => $docKey) {
            if (isset($files[$docKey]) && $files[$docKey]['error'] == 0) {
                $fileName = time() . '_' . $this->provider_id . '_' . ($index + 1) . '_' . basename($files[$docKey]['name']);
                $filePath = $uploadDir . $fileName;
                
                if (move_uploaded_file($files[$docKey]['tmp_name'], $filePath)) {
                    $uploadedFiles[] = $fileName;
                }
            }
        }

        // Insert verification request
        if (count($uploadedFiles) === 3) {
            $stmt = mysqli_prepare($this->db_conn, 
                'INSERT INTO verifications (provider_id, doc_1, doc_2, doc_3, status, requested_on) 
                 VALUES (?, ?, ?, ?, FALSE, NOW())'
            );
            
            mysqli_stmt_bind_param($stmt, 'ssss', 
                $this->provider_id,
                $uploadedFiles[0],
                $uploadedFiles[1],
                $uploadedFiles[2]
            );
            
            return mysqli_stmt_execute($stmt);
        }
        
        return false;
    }
}
