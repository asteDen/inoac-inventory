<?php
require('./database.php');

if (isset($_POST['deleteLaptopYes'])){
    $deleteLaptopId = $_POST['deleteLaptopId'];

    $queryDeleteLaptop = "DELETE FROM laptops WHERE laptop_id = '$deleteLaptopId'";
    $sqliDeleteLaptop = mysqli_query($connection, $queryDeleteLaptop);

    echo '<script>alert("Successfully deleted!")</script>';
    echo '<script>window.location.href = "./inventory_laptop.php"</script>';
} else {
    echo '<script>window.location.href = "./inventory_laptop.php"</script>';
}

?>