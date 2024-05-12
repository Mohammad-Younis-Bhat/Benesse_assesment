<?php
    session_start();
    require_once('../config.php');
    require_once('../dbConfig.php');
    $db = dbConnect::getConnection($config['db_server'],$config['db_username'],$config['db_password'],$config['db']);
    require_once('../common/Validation.php');
    require_once('../controller/loginController.php');
    $Auth = new loginController($db);
    $validation = new Validate();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $validateStatus = $validation->validatelogin($_POST['username'], $_POST['passcode']);
        if($validateStatus){
            $type = (filter_var($_POST['username'], FILTER_VALIDATE_EMAIL) == true)?'email':'phone';
            if($Auth->login($_POST['username'], $_POST['passcode'],$type)){
                
               // header("Location: http://localhost/banees/Dashboard.php");
                return true;
                exit();
            }
            echo $response;
            return;
        }else{
            return $validation;
        }
    echo "success";
    }
?>
    
