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
    public function getUsers(){
        $sql = "SELECT * FROM users JOIN api ON users.user_id = api.user_id";
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $users=array();
        while($row=$result->fetch_assoc()){
            $users[]=$row;
        }
        return $users;
    }
    public function addUser($username, $email, $password, $gender,) {
        // You should hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Generate a random 20-character API key
        $apiKey = bin2hex(random_bytes(10));
    
        // Generate a random 4-digit ID
        $randomUserId = rand(1000, 9999);
    
        // Calculate expiry date (30 days from now)
        $expiryDate = date('Y-m-d H:i:s', strtotime('+30 days'));
    
        // Insert user into the 'users' table
        $sql = "INSERT INTO users (user_id, username, email, password, gender) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("issss", $randomUserId, $username, $email, $hashedPassword, $gender);
        $stmt->execute();
    
        // Insert API key into the 'api' table
        $sqlApiKey = "INSERT INTO api (user_id, api_key, expiry_date) VALUES (?, ?, ?)";
        $stmtApiKey = $this->db->prepare($sqlApiKey);
        $stmtApiKey->bind_param("sss", $randomUserId, $apiKey, $expiryDate);
        $stmtApiKey->execute();
    
        return true;
    }
    public function getOneUser($userId){
        $sql = "SELECT * FROM users JOIN api ON users.user_id = api.user_id WHERE users.user_id = $userId";
        $result = $this->db->query($sql);

        if($result ==false){
            return false;
        }
        $users=array();
        while($row=$result->fetch_assoc()){
            $users[]=$row;
        }
        return $users;
    }  
    public function updateUser($id,$username, $email,$gender,$apiKey) {
        $sql = "UPDATE users SET username = ?, email = ?, gender = ? WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $gender,$id);
        $stmt->execute();

        $sqlApiKey = "UPDATE api SET api_key = ?  WHERE user_id = ?";
        $stmtApiKey = $this->db->prepare($sqlApiKey);
        $stmtApiKey->bind_param("si", $apiKey, $id);
        $stmtApiKey->execute();

        return true;
    }
    public function deleteUser($id){
        $sqlApi= "DELETE FROM api WHERE user_id = $id";
        $resultApi = $this->db->query($sqlApi);
        $sql = "DELETE FROM users WHERE user_id = $id";
        $result = $this->db->query($sql);
        
        return $resultApi;

    }
}
?>
