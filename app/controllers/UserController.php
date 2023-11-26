<?php
namespace App\Controllers;


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
                $roleID = ucfirst($role.'ID');

                $_SESSION['UserID'] = $user[$roleID];
                header("Location: ../public/index.php?action=index&role=$role");
                exit;
            } else {
                // Invalid login, show an error message
                header("Location: ../public/index.php?action=login&message=0&role=$role");
            }
        }

        // Display the login form
        require_once("../views/$role/login.php");
    }
    public function index($role){

        require_once("../views/$role/index.php");
    }


    public function signup($role) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["Username"];
            $password = $_POST["Password"];

            if ($this->model->createUser($username, $password,$role)) {
                // Successful registration, redirect to a login page
                header("Location: ../public/index.php?action=login&message=1&role=$role");
                exit;
            } else {
                // Registration failed, show an error message
                header("Location: ../public/index.php?action=login&message=0&role=$role");
            }
        }

        // Display the sign-up form
        require_once("../views/$role/login.php");
    }
    public function displayUsers(){
        $patients = $this->model->getPatient();
        $doctors = $this->model->getDoctor();
        $pharmacists = $this->model->getPharmacist();

        require_once("../views/admin/users.php");
    }
    public function patientDetails($id){
        $patients = $this->model->getOnePatient($id);
        require_once('../views/patient/details.php');
    }
}
?>

