<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($username, $password , $role) {
        // You should hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user into the database
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword, $role);
        
        return $stmt->execute();
    }

    public function getUserByUsername($username) {
        // Fetch user from the database by username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
