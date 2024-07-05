<?php
    require('../database.php');
    require('../includes/functions.inc.php');

    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $repwd = $_POST['repwd'];

        if (emptyInputSignup($username, $fullname, $email, $pwd, $repwd) !== false){
            header("location: ../signup.php?error=emty_input");
            exit();
        }
        if (invalidUserId($username) !== false){
            header("location: ../signup.php?error=invalid_userid");
            exit();
        }
        if (invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalid_email");
            exit();
        }
        if (pwdMatch($pwd, $repwd) !== false){
            header("location: ../signup.php?error=password_dont_match");
            exit();
        }
        if (usernameExist($connection, $username, $email) !== false){
            header("location: ../signup.php?error=username_already_exist");
            exit();
        }
        createUserAdmin($connection, $username, $fullname, $email, $pwd);
    } else {
            header("location: ../signup.php");
            exit();
    }