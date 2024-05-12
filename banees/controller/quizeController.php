<?php
class quizeController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getQuestions($limit) {
        $sql = "SELECT * FROM `Questions` ORDER BY RAND() LIMIT ".$limit;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $questions = [];
            while ($row = $result->fetch_assoc()) {
                $questions[] = $row;
            }
            return $questions;
        } else {
            [];
        }
    }

    function verifyAnswer($questionID, $optAnswer){
        $sql = "SELECT * FROM `Questions` where `Question_Id` = $questionID";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        if($row['Correct_Option'] === $optAnswer){
            return true;
        }
        return false;
    }
 }
?>