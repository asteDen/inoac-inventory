<?php
    require('../database.php');
    require('../includes/functions.inc.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $userPassword = $_POST['userPassword'];

    if (emptyInputLogin($username, $userPassword) !== false){
        header("location: ../index.php?error=emty_input");
        exit();
    }

    loginUser($connection, $username, $userPassword);

    } else {
        header ("location: ../index.php");
        exit();
    }