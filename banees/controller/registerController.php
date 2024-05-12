<?php
class registerController {
    private $conn;

    public function __construct($dbcon) {
        $this->conn = $dbcon;
    }

    public function signup($name, $cell, $email, $password) {
        // Validate and sanitize inputs
        $name = $this->conn->real_escape_string($name);
        $cell = $this->conn->real_escape_string($cell);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);

        // Check if email already exists
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return "Email already exists";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users VALUES (null,'$name','$email', '$cell', '$hashedPassword', now())";
            if ($this->conn->query($sql) === TRUE) {
                return "Signup successful";
            } else {
                return "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }
    }
}

?>