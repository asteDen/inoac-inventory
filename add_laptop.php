<?php 
    require('./database.php');

    if(isset($_POST['addLaptop'])){

    $laptopId = $_POST['laptopId'];
    $laptopModel = $_POST['laptopModel'];
    $laptopOsVersion = $_POST['laptopOsVersion'];
    $laptopProcessor = $_POST['laptopProcessor'];
    $dateAquiredLaptop = $_POST['dateAquiredLaptop'];

    $quiryAddLaptop = "INSERT INTO laptops
                        VALUES ('$laptopId', '$laptopModel', '$laptopOsVersion', '$laptopProcessor', '$dateAquiredLaptop')";
    $sqlAddLaptop = mysqli_query($connection, $quiryAddLaptop);

    echo '<script>alert("Successfully created!")</script>';
    echo '<script>window.location.href = "./inventory_laptop.php"</script>';
    } else {
        echo '<script>window.location.href = "./inventory_laptop"</script>';
    }

?>