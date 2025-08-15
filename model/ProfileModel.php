<?php
class ProfileModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserProfile($userId) {
        $stmt = $this->conn->prepare("SELECT u.username, s.total_score , u.email 
                                      FROM users u 
                                      LEFT JOIN scores s ON u.id = s.user_id 
                                      WHERE u.id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
