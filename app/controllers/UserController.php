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
        $users = $this->model->getUsers();

        require_once("../views/admin/users.php");
    }
    public function patientDetails($id){
        $patients = $this->model->getOnePatient($id);
        require_once('../views/patient/details.php');
    }
    public function addUser()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST['username'];
        $email = $_POST['user_email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        // Add validation and hashing for password as needed

        if ($this->model->addUser($username, $email, $password, $gender)) {
            header("Location: ../public/index.php?action=displayUsers");
            exit;
        } else {
            // Registration failed, show an error message
            echo "User Adding failed";
        }
    }

    require("../views/Admin/add_user.php");
}
public function editUser($id)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve form data
        $username = $_POST['username'];
        $email = $_POST['user_email'];
        $gender = $_POST['gender'];
        $apiKey = $_POST['api_key'];

        // Call model function to update user details
        if ($this->model->updateUser($id, $username, $email, $gender, $apiKey)) {
            // Redirect to user details page or any other appropriate page
            header("Location: ../public/index.php?action=displayUsers");
            exit;
        } else {
            // Error handling
            echo "User details update failed";
        }
    }

    // Fetch user details for editing
    $userId = $_GET['id'];
    $users = $this->model->getOneUser($userId);

    // Pass user details to the view
    require("../views/admin/edit_user.php");
}
public function deleteUser($id)
{
    if ($this->model->deleteUser($id)) {
        header("Location: ../public/index.php?action=displayUsers");
        exit;
    } else {
        // Error handling
        echo "User deletion failed";
    }

}
}

?>

