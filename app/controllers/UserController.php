<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            session_start();
            $username = $_POST["Username"];
            $password = $_POST["Password"];
            $role = $_POST["Role"];
            $user = $this->model->getUserByUsername($username,$role);

            if ($user && password_verify($password, $user["Password"])) {
                // Successful login, redirect to a welcome page or dashboard
                $_SESSION['UserID'] = $user['UserID'];
                header("Location: ../views/$role/index.php ");
                exit;
            } else {
                // Invalid login, show an error message
                echo "Invalid username or password";
            }
        }

        // Display the login form
        require_once("../views/Admin/login.php");
    }


    public function signup() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["Username"];
            $password = $_POST["Password"];
            $role = $_POST["Role"];

            if ($this->model->createUser($username, $password,$role)) {
                // Successful registration, redirect to a login page
                header("Location: /index.php?action=login");
                exit;
            } else {
                // Registration failed, show an error message
                echo "Registration failed";
            }
        }

        // Display the sign-up form
        require_once("../views/$role/login.php");
    }
}
?>

