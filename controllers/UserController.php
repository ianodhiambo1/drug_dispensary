<?php
class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $user = $this->model->getUserByUsername($username);

            if ($user && password_verify($password, $user["password"])) {
                // Successful login, redirect to a welcome page or dashboard
                header("Location: welcome.php");
                exit;
            } else {
                // Invalid login, show an error message
                echo "Invalid username or password";
            }
        }

        // Display the login form
        require_once("../view/admin/login.php");
    }

    public function signup() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($this->model->createUser($username, $password)) {
                // Successful registration, redirect to a login page
                header("Location: index.php?action=login");
                exit;
            } else {
                // Registration failed, show an error message
                echo "Registration failed";
            }
        }

        // Display the sign-up form
        require_once("../view/admin/login.php");
    }
}
?>
