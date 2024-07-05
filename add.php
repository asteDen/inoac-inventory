<?php
require('./database.php');

if (isset($_POST['add-user-button'])){
    $userid = $_POST['userid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];

    $queryAdd = "INSERT INTO users(id,firstname, lastname, gender, department)
                VALUES ('$userid','$firstname', '$lastname', '$gender', '$department')";
    $sqlAdd = mysqli_query($connection, $queryAdd);


    echo '<script>alert("Successfully created!")</script>';
    echo '<script>window.location.href = "./users.php"</script>';
    } else {
        echo '<script>window.location.href = "./users.php"</script>';
    }

?>