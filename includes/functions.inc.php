<?php

    function emptyInputSignup($username, $fullname, $email, $pwd, $repwd){
        $result = 0;
        
        if(empty($username) || empty($fullname) || empty($email) || empty($pwd)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function invalidUserId($username){
        $result = 0;
        
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email){
        $result = 0;
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function pwdMatch($pwd, $repwd){
        $result = 0;
        
        if($pwd !== $repwd){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function usernameExist($connection, $username, $email){
        $sqlUsernameExist = "SELECT * FROM adminusers WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($stmt, $sqlUsernameExist)){
            header ("location: ../signup.php?error=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        } else {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt); 
    }
    function createUserAdmin($connection, $username, $fullname, $email, $pwd){
        $sqlUsernameExist = "INSERT INTO adminusers (username, fullname, email, userpassword) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($stmt, $sqlUsernameExist)){
            header ("location: ../signup.php?error=stmtFailed");
            exit();
        }

        $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $username, $fullname, $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt); 

        header ("location: ../signup.php?error=none");
            exit();
    }

    function emptyInputLogin($username, $userPassword){
        $result = 0;
        
        if(empty($username) || empty($userPassword)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function loginUser($connection, $username, $userPassword){
        $useridExist = usernameExist($connection, $username, $username);

        if($useridExist === false){
            header ("location: ../index.php?error=wrong_credentials");
            exit();
        }

        $passwordHashed = $useridExist["userpassword"];
        $checkPassword = password_verify($userPassword, $passwordHashed);

        if($checkPassword === false){
            header ("location: ../index.php?error=wrong_credentials");
            exit();
        } else if ($checkPassword === true){
            session_start();
            $_SESSION["usersid"] =  $useridExist["userid"];
            $_SESSION["username"] = $useridExist["username"];

            header ("location: ../dashboard.php");
            exit();
        }

    }

    function countItem($connection, $tbName, $id){
        $count = 0;

        $queryCountItem = "SELECT $id FROM $tbName;";
        $sqlCountItem = mysqli_query($connection, $queryCountItem);

        while($results = mysqli_fetch_array($sqlCountItem)){
            $count++;
          }

        return $count;
    }