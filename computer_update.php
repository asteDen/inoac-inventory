<?php 
    require('./database.php');

    if(isset($_POST['updateComputer'])){
        $toUpdatedComputerId = $_POST['updatedComputerId'];
        $toUpdatedOsVersion = $_POST['updatedOsVersion'];
        $toUpdatedProcessor = $_POST['updatedProcessor'];
        $toUpdatedDateAquired = $_POST['updatedDateAquired'];
        $toUpdatedIpAddress = $_POST['updatedIpAddress'];

        $queryComputerUpdate = "UPDATE computers SET os_version = '$toUpdatedOsVersion', processor = '$toUpdatedProcessor', date_aquired = '$toUpdatedDateAquired', ip_address = '$toUpdatedIpAddress'
                                WHERE computer_id = '$toUpdatedComputerId'";
        $sqlComputerUpdate = mysqli_query($connection, $queryComputerUpdate);

        echo '<script>alert("Successfully updated!")</script>';
        echo '<script>window.location.href = "./inventory_computer.php"</script>';
    } else {
        echo '<script>window.location.href = "./inventory_computer.php"</script>';
    }

?>