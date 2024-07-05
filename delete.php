<?php
require('./database.php');

if (isset($_POST['delete'])){
    $deleteId = $_POST['deleteId'];

    $queryDelete = "DELETE FROM users WHERE id = $deleteId";
    $sqliDelete = mysqli_query($connection, $queryDelete);

    echo '<script>alert("Successfully deleted!")</script>';
    echo '<script>window.location.href = "./users.php"</script>';
} else {
    echo '<script>window.location.href = "./users.php"</script>';
}

?>