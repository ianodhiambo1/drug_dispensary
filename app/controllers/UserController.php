<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login($role) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            session_start();
            $username = $_POST["Username"];
            $password = $_POST["Password"];
            $user = $this->model->getUserByUsername($username,$role);

            if ($user && password_verify($password, $user["Password"])) {
                // Successful login, redirect to a welcome page or dashboard
                $_SESSION['UserID'] = $user['UserID'];
                header("Location: ../views/$role/index.php ");
                exit;
            } else {
                // Invalid login, show an error message
                header("Location: ../public/index.php?action=login&message=0&role=$role");
            }
        }

        // Display the login form
        require_once("../views/$role/login.php");
    }


    public function signup($role) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["Username"];
            $password = $_POST["Password"];

            if ($this->model->createUser($username, $password,$role)) {
                // Successful registration, redirect to a login page
                header("Location: /index.php?action=login?role=$role");
                exit;
            } else {
                // Registration failed, show an error message
                header("Location: ../public/index.php?action=login&message=0&role=$role");
            }
        }

        // Display the sign-up form
        require_once("../views/$role/login.php");
    }
}
?>

