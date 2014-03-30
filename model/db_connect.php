<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dsn = 'mysql:host=localhost;dbname=news_center';
$username = 'root';
$password = 'mysql';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
    //echo 'Connected.';
} catch (PDOException $ex) {
    $error_msg = $ex->getMessage();
    include('./errors/db_error.php');
    exit();
}

function display_db_error($error_message) {
    global $app_path;
    include './errors/db_error.php';
    exit;
}
        
?>
