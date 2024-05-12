<?php
session_start();
class loginController {
    private $conn;
    
    public function __construct($dbCon) {
        $this->conn = $dbCon;
        
    }

    public function login($email, $password,$type) {
        $email = $this->conn->real_escape_string($email); // here email can contain email address or phone number as well
        $sql = "SELECT * FROM users WHERE $type='$email'";   
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        //die($row);
        if ($result->num_rows > 0 && password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['name'];
            return true;
        } else {
            return "Invalid Credentials";
        }
    }
}
?>