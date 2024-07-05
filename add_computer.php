<?php 
    require('./database.php');

    if(isset($_POST['addComputer'])){

    $computerId = $_POST['computerId'];
    $osVersion = $_POST['osVersion'];
    $processor = $_POST['processor'];
    $dateAquiredComputer = $_POST['dateAquiredComputer'];
    $ipAddress = $_POST['ipAddress'];

    $quiryAddComputer = "INSERT INTO computers
                        VALUES ('$computerId', '$osVersion', '$processor', '$dateAquiredComputer', '$ipAddress')";
    $sqlAddComputer = mysqli_query($connection, $quiryAddComputer);

    echo '<script>alert("Successfully created!")</script>';
    echo '<script>window.location.href = "./inventory_computer.php"</script>';
    } else {
        echo '<script>window.location.href = "./inventory_computer"</script>';
    }

?>