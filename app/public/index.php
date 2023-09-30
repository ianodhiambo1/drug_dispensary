<?php
require_once("../config/database.php");
require_once("../models/UserModel.php");
require_once("../controllers/UserController.php");
require_once("../models/DrugModel.php");
require_once("../controllers/DrugController.php");
// Initialize the database connection and models
$db = new mysqli("localhost", "root", "", "dispenser");
$userModel = new UserModel($db);
$drugModel = new DrugModel($db);

// Include the controller and handle actions
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$category = isset($_GET['cat']) ? $_GET['cat']: 'Analgesics';
use App\Controllers\UserController;
use App\Controllers\DrugController;

$controller = new UserController($userModel);
$drugController = new DrugController($drugModel);

if ($action === 'login') {
    $controller->login();
} elseif ($action === 'signup') {
    $controller->signup();
} elseif($action==='display'){
    $drugController->displayDrugs();
} 
 elseif($action==='displayImage'){
    $drugController->displayDrugsImage();
} 
 elseif($action==='displayCategory'){
    $drugController->displayCategory($category);
} 
 elseif($action==='addDrug'){
    $drugController->addDrugs();
} 
else {
    // Handle other actions or display an error
}
?>
