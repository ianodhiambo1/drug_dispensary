<?php
namespace App\Controllers;

class DrugController
{
    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function displayDrugs()
    {
        $drugs = $this->model->getAllDrugs();
        if ($drugs === false) {
            echo "Error fetching drug details.";
            return;
        }

        require_once("../views/Admin/drugs.php");
    }
    public function displayDrugsImage()
    {
        $drugs = $this->model->getAllDrugs();
        if ($drugs === false) {
            echo "Error fetching drug details";
            return;
        }
        require("../views/Admin/drugs_image.php");
    }
    public function addDrugs()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST['DrugID'];
            $pharmco = $_POST['PharmaceuticalCompany'];
            $price = $_POST['Price'];
            $category = $_POST['Category'];
            $description = $_POST['Description'];

            // Check if a file was uploaded without errors
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                $file = $_FILES["image"];
                $uploadDir = "uploads/"; // Directory where uploaded images will be stored
                $uploadPath = $uploadDir . basename($file["name"]);

                // Check if the file is an image
                $imageFileType = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION));
                $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

                if (in_array($imageFileType, $allowedExtensions)) {
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                        // File was uploaded successfully
                        echo "Image uploaded successfully.";

                        // You can store the $uploadPath in the database if needed
                    } else {
                        echo "Error uploading image.";
                    }
                } else {
                    echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
                }
            } else {
                echo "No file uploaded or an error occurred during upload.";
            }
            if ($this->model->AddDrug($name, $pharmco,$price,$category,$description,$uploadPath)) {
                header("Location: /index.php?action=displayImage");
                exit;
            } else {
                // Registration failed, show an error message
                echo "Drug Adding failed";
            }
        }
        require("../views/Admin/add_drug.php");
    }
    public function displayCategory($category)
    {
        $drugs = $this->model->getCategory($category);
        if ($drugs === false) {
            echo "Error fetching drug details";
            return;
        }
        require("../views/Admin/drugs_image.php");
    }
}

?>