<?php

require_once "./Model/Database.php";

class UserModel extends Database

{
    public function  __construct()

    {

        parent::__construct();

    }

    public function getUsers($limit)

    {

        return $this->select("SELECT * FROM users ORDER BY username  ASC LIMIT ?", ["i", $limit]);

    }
    public function registerUser($username, $password)

    {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        error_log($username);
        $stmt = $this->connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

        $stmt->bind_param("ss", $username, $hashedPassword);

        $stmt->execute();

        $stmt->close();

        return true;

    }
    public function getUserByUsername($username)

    {

        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        $stmt->close();

        return $result;

    }

}
?>