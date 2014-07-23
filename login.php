<?php
require_once('include/bootstrap.php');
require_once('include/header.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    //$password = md5($_POST['password']);
    $password = $_POST['password'];

    $sql = "
		SELECT *
		FROM users
		WHERE username = '" . $username . "'
		AND password = '".md5($password)."'";

    $found_results = db_select($sql);

    //print_r($found_results);
    if (count($found_results) > 0) {
        $_SESSION['logged_in'] = true;
        $_SESSION['errors'] = false;
        $_SESSION['user'] = $found_results[0];

        redirect('welcome.php');
        exit;
		
    } else {
        $_SESSION['logged_in'] = false;
        $_SESSION['errors'] = true;
		
        redirect('index.php');
        exit;
    }
}
