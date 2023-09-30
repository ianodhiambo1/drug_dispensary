<?php

class DrugModel{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }
    public function getAllDrugs(){
        $sql = "SELECT * FROM drugs";
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
        $sql = "SELECT * FROM drugs WHERE Category = ?";
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
}


?>