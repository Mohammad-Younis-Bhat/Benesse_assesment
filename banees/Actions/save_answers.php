<?php
require_once('../config.php');
require_once('../dbConfig.php');
$db = dbConnect::getConnection($config['db_server'],$config['db_username'],$config['db_password'],$config['db']);
require_once('../controller/quizeController.php');
$Quize = new quizeController($db);

$scoreCard = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answerSet = $_POST['answerData'];//json_decode($_POST['answerData'], true);
    foreach($answerSet as  $answer){
        if($Quize->verifyAnswer($answer['questionId'],$answer['answer'])){
            $scoreCard[$answer['questionId']] =  array(
                'Q_id' => $answer['questionId'],
                'result' => 'correct',
                'serial_id' => $answer['q_serial']
            );
        }else{
            $scoreCard[$answer['questionId']] =  array(
                'Q_id' => $answer['questionId'],
                'result' => 'Wrong',
                'serial_id' => $answer['q_serial']
            );
        }
    }
    echo json_encode($scoreCard);
} else {
    http_response_code(405);
    echo "Invalid request method";
}
?>