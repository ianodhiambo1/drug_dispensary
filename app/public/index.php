<?php
require_once("../models/UserModel.php");
require_once("../controllers/UserController.php");
// Initialize the database connection and models
$db = new mysqli("localhost", "root", "", "dispenser");
$userModel = new UserModel($db);

// Include the controller and handle actions
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
use App\Controllers\UserController;

$controller = new UserController($userModel);

if ($action === 'login') {
    $controller->login();
} elseif ($action === 'signup') {
    $controller->signup();
} else {
    // Handle other actions or display an error
}
?>
