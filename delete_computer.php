<?php
require('./database.php');

if (isset($_POST['deleteComputerYes'])){
    $toDeleteComputerId = $_POST['toDeleteComputerId'];

    $queryDeleteComputer = "DELETE FROM computers WHERE computer_id = '$toDeleteComputerId'";
    $sqliDeleteComputer = mysqli_query($connection, $queryDeleteComputer);

    echo '<script>alert("Successfully deleted!")</script>';
    echo '<script>window.location.href = "./inventory_computer.php"</script>';
} else {
    echo '<script>window.location.href = "./inventory_computer.php"</script>';
}

?>