<?php 
    require('./database.php');

    if(isset($_POST['updateLaptop'])){
        $updatedLaptopId = $_POST['updateLaptopId'];
        $toUpdateLaptopModel = $_POST['toUpdateLaptopModel'];
        $toUpdatelaptopOsVersion = $_POST['toUpdatelaptopOsVersion'];
        $toUpdateLaptopProcessor = $_POST['toUpdateLaptopProcessor'];
        $toUpdateDateAquiredLaptop = $_POST['toUpdateDateAquiredLaptop'];

        $queryLaptopUpdate = "UPDATE laptops SET model = '$toUpdateLaptopModel', os_version_l = '$toUpdatelaptopOsVersion', processor_l = '$toUpdateLaptopProcessor', date_aquired_l = '$toUpdateDateAquiredLaptop'
                                WHERE laptop_id = '$updatedLaptopId'";
        $sqlLaptopUpdate = mysqli_query($connection, $queryLaptopUpdate);

        echo '<script>alert("Successfully updated!")</script>';
        echo '<script>window.location.href = "./inventory_laptop.php"</script>';
    } else {
        echo '<script>window.location.href = "./inventory_laptop.php"</script>';
    }

?>