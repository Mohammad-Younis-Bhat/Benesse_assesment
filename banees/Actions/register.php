<?php
    require_once('../config.php');
    require_once('../dbConfig.php');
    $db = dbConnect::getConnection($config['db_server'],$config['db_username'],$config['db_password'],$config['db']);
    require_once('../common/Validation.php');
    require_once('../controller/registerController.php');
    $Auth = new registerController($db);
    $validation = new Validate();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $validateStatus = $validation->validateRegister($_POST['FullName'], $_POST['cell'], $_POST['email'], $_POST['passcode']);
        if($validateStatus){
            $response = $Auth->signup($_POST['FullName'], $_POST['cell'], $_POST['email'], $_POST['passcode']);
            echo $response;
        }else{
            return $validation;
        }
    }
?>