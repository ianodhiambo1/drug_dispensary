<?php

require_once "./Model/Database.php";

class UserModel extends Database
{
    public function __construct()
    {

        parent::__construct();

    }

    public function getUsers($limit)
    {

        return $this->select("SELECT * FROM users ORDER BY username  ASC LIMIT ?", ["i", $limit]);

    }
    public function generateApiKey() {
        return bin2hex(random_bytes(32)); // 64 characters
    }
    public function registerUser($username, $password)
    {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        error_log($username);
        $stmt = $this->connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

        $stmt->bind_param("ss", $username, $hashedPassword);

        $stmt->execute();
        $stmt = $this->connection->prepare("SELECT * FROM api
        UNION
        SELECT *
        FROM users 
        WHERE username = ?;
        ");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = array();
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }
        $user_id = $user['user_id'];
        $api_key = $this->generateApiKey();
        
        $stmt = $this->connection->prepare('INSERT INTO api_keys (user_id, api_key) VALUES (?, ?)');
        $stmt->bind_param('is', $user_id, $api_key);
        $stmt->execute();


        echo json_encode(['api_key' => $api_key, 'message' => 'API key generated successfully']);
        return true;

    }
    public function getUserByUsername($username)
    {
        error_log($username);
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();


        $stmt->close();

        return $result;

    }
    public function getApiUserByUsername($id)
    {
        error_log($id);
        $stmt = $this->connection->prepare("SELECT *
        FROM users
        JOIN api ON users.user_id = api.user_id
        WHERE users.user_id = ?; 
        ");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();
        $user = array();
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }

        $stmt->close();

        return $user;

    }

}
?>