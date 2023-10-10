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
    public function shop()
    {
        $drugs = $this->model->getAllDrugs();
        if ($drugs === false) {
            echo "Error fetching drug details";
            return;
        }
        require("../views/Patient/shop.php");
    }
    public function addDrugs()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST['DrugID'];
            $pharmco = $_POST['PharmaceuticalCompany'];
            $price = $_POST['Price'];
            $category = $_POST['Category'];
            $description = $_POST['Description'];


            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    $imageUrl=htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            if ($this->model->AddDrug($name, $pharmco, $price, $category, $description, $imageUrl)) {
                header("Location: ../public/index.php?action=displayImage");
                exit;
            } else {
                // Registration failed, show an error message
                echo "Drug Adding failed";
            }
        }
        require("../views/Admin/add_drugs.php");
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
    public function editDrugs($id) {
        // Assuming you have the drug data in the $_POST array
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['DrugName'];
        $pharmco = $_POST['PharmaceuticalCompany'];
        $price = $_POST['Price'];
        $category = $_POST['Category'];
        $description = $_POST['Description'];
        if(isset($_GET["id"])){
            $id = $_GET['id'];}


        $success = $this->model->updateDrug($id, $name, $pharmco, $price, $category, $description);
        

        if ($success) {
            header("Location: ../public/index.php?action=display&message=1");
            exit;
        } else {
            echo "Drug Adding failed";
        }
    }
    $drugs=$this->model->getData($id);
    if ($drugs === false) {
        echo "Error fetching drug details";
        return;
    }
    require("../views/Admin/edit_drugs.php");
}

    public function deleteDrugs($id) {
        $success = $this->model->deleteDrug($id);

        if ($success) {
            header("Location: ../public/index.php?action=display&message=2");
        } else {
            return "Error deleting drug";
        }
    }
    public function displayDrugDetails($id){
        $drugs=$this->model->getData($id); 
        if ($drugs === false) {
            echo "Error fetching drug details";
            return;
        }
        require("../views/Admin/drug_details.php");
    }
    
}

?>