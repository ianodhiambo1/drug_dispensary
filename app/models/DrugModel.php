<?php

class DrugModel{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }
    public function getAllDrugs(){
        $sql = "SELECT * FROM medicine";
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $drugs=array();
        while($row=$result->fetch_assoc()){
            $drugs[]=$row;
        }
        return $drugs;
    }
    public function getData($id){
        $sql = "SELECT * FROM medicine WHERE MedicineID=".$id;
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $drugs=array();
        while($row=$result->fetch_assoc()){
            $drugs[]=$row;
        }
        return $drugs;
    }
    public function getCategory($category){
        $sql = "SELECT * FROM medicine WHERE Category = ?";
        $stmt= $this->db->prepare($sql);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s",$category);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            return false;
        }
        

        $drugs=array();
        while($row=$result->fetch_assoc()){
            $drugs[]=$row;
        }
        return $drugs;
    }
    public function AddDrug($name, $pharmco,$price,$category,$description,$imageUrl){
        $imageUrl="../uploads/".$imageUrl;
        $id=rand(2000,7000);
        $sql="INSERT INTO medicine (MedicineID,Name,Company,Price,Category,Description,ImageUrl) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssss",$id,$name, $pharmco,$price,$category,$description,$imageUrl);
        return $stmt->execute();

    }
    public function updateDrug($id, $name, $pharmco, $price, $category, $description) {
        $sql = "UPDATE `medicine` SET `Name`='$name', `Company`='$pharmco', `Price`='$price', `Category`='$category', `Description`='$description' WHERE `medicine`.`MedicineID`=$id;";
        echo $sql;
        
        $result = $this->db->query($sql);
        return $result;
    }


    public function deleteDrug($id) {
        $sql = "DELETE FROM medicine WHERE MedcineID=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}


?>