<?php
class Validate
{
    public function validateRegister($Name, $cell, $email, $password)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }

        // Validate phone number (Assuming a simple validation for 10 digits)
        if (!preg_match("/^[0-9]{10}$/", $cell)) {
            return "Invalid phone number";
        }

        // Validate name (Assuming a simple validation for alphabets and spaces)
        if (!preg_match("/^[a-zA-Z ]*$/", $Name)) {
            return "Invalid name";
        }

        // Validate password (Assuming minimum 6 characters with at least one uppercase, one lowercase, and one digit)
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $password)) {
            return "Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, and one digit";
        }
        return true;
    }
    public function validatelogin($email, $password, $cell = null)
    {
        if(isset($cell)){
            if (!preg_match("/^[0-9]{10}$/", $cell)) {
                return "Invalid phone number";
            }
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }

        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $password)) {
            return "Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, and one digit";
        }
        return true;
    }
}

?>