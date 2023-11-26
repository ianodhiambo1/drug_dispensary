<?php
require_once("../config/database.php");
require_once("../models/UserModel.php");
require_once("../controllers/UserController.php");
require_once("../models/DrugModel.php");
require_once("../controllers/DrugController.php");
// Initialize the database connection and models
$db = new mysqli("localhost", "root", "", "matadrugs");
$userModel = new UserModel($db);
$drugModel = new DrugModel($db);

// Include the controller and handle actions
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$role = isset($_GET['role']) ? $_GET['role'] : 'patient';
$category = isset($_GET['cat']) ? $_GET['cat']:'';
$id = isset($_GET['id']) ? $_GET['id'] : '0';
use App\Controllers\UserController;
use App\Controllers\DrugController;

$controller = new UserController($userModel);
$drugController = new DrugController($drugModel);

if ($action === 'login') {
    $controller->login($role);
} 
elseif ($action === 'signup') {
    $controller->signup($role);
} 
elseif ($action === 'index') {
    $controller->index($role);
}
elseif ($action === 'patientDetails') {
    $controller->patientDetails($id);
}
// elseif ($action === 'updatePatientDetails') {
//     $controller->updatePatientDetails($id);
// }
elseif ($action === 'display') {
    $drugController->displayDrugs();
} 
elseif ($action === 'displayImage') {
    $drugController->displayDrugsImage();
} 
elseif ($action === 'displayCategory') {
    $drugController->displayCategory($category);
} 
elseif ($action === 'addCategory') {
    $drugController->addCategory();
} 

elseif ($action === 'addDrug') {
    $drugController->addDrugs();
} 
elseif ($action === 'editDrug') {
    $drugController->editDrugs($id);
} 
elseif ($action === 'deleteDrug') {
    $drugController->deleteDrugs($id);
} 
elseif ($action === 'deleteCategory') {
    $drugController->deleteCategory($id);
} 
elseif ($action === 'viewDrug') {
    $drugController->displayDrugDetails($id);
} 
elseif ($action === 'shop') {
    $drugController->shop($category);
} 
elseif($action === 'displayUsers'){
    $controller->displayUsers();
}
else {
    $controller->login($role);
}
?>