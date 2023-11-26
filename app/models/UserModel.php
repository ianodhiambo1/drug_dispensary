<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($username, $password , $role) {
        // You should hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Insert user into the database
        $sql = "INSERT INTO $role (UserName, Password) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword);
        
        return $stmt->execute();
    }
    public function getPatient(){
        $sql = "SELECT DISTINCT p.PatientID, u.UserName, p.WalletID,  
        pd.FirstName, pd.LastName, pd.City, pd.PostalCode 
        FROM patient AS p
        LEFT JOIN patientdetail AS pd ON p.PatientID = pd.PatientID
        LEFT JOIN patient AS u ON p.PatientID = u.PatientID;";
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $patients=array();
        while($row=$result->fetch_assoc()){
            $patients[]=$row;
        }
        return $patients;

    }
    public function getOnePatient($id){
        $sql = 
        "   SELECT p.PatientID, u.Username, pd.FirstName, pd.LastName, pd.City, pd.PostalCode, w.Balance
            FROM patient AS p
            LEFT JOIN patientdetail AS pd ON p.PatientID = pd.PatientID
            LEFT JOIN patient AS u ON p.PatientID = u.PatientID
            LEFT JOIN wallet AS w ON u.WalletID = w.WalletID
            WHERE p.PatientID = $id;
        ";
        
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $patients=array();
        while($row=$result->fetch_assoc()){
            $patients[]=$row;
        }
        return $patients;

    }
    public function getDoctor(){
        $sql = "SELECT * FROM doctor";
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $doctors=array();
        while($row=$result->fetch_assoc()){
            $doctors[]=$row;
        }
        return $doctors;

    }
    public function getPharmacist(){
        $sql = "SELECT * FROM pharmacist";
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $pharmacists=array();
        while($row=$result->fetch_assoc()){
            $pharmacists[]=$row;
        }
        return $pharmacists;

    }
    public function getUserByUsername($username,$role) {
        // Fetch user from the database by username
        $sql = "SELECT * FROM $role WHERE UserName = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
