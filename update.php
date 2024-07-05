<?php 
    require('./database.php');

    if(isset($_POST['updateUser'])){

        $updatedId = $_POST['updatedId'];
        $updateComputerId = $_POST['updatedComputerId'];
        $updateLaptopId = $_POST['updatedLaptopId'];
        $updatedFirstname = $_POST['updatedFirstname'];
        $updatedLastname = $_POST['updatedLastname'];
        $updatedGender = $_POST['updatedGender'];
        $updatedDepartment = $_POST['updatedDepartment'];

        $queryUpdate = "UPDATE users SET computer_id = '$updateComputerId', laptop_id = '$updateLaptopId', firstname = '$updatedFirstname', lastname = '$updatedLastname', gender = '$updatedGender', department = '$updatedDepartment'
                        WHERE id = '$updatedId'";
        $sqlUpdate = mysqli_query($connection, $queryUpdate);

        echo '<script>alert("Successfully updated!")</script>';
        echo '<script>window.location.href = "./users.php"</script>';
    } else {
        echo '<script>window.location.href = "./users.php"</script>';
    }


?>