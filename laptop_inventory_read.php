<?php 
require('./database.php');

    $quiryLaptop = "SELECT laptops.laptop_id, laptops.model, users.firstname, users.lastname, laptops.os_version_l, laptops.processor_l, laptops.date_aquired_l
                        FROM users
                        RIGHT JOIN laptops ON users.laptop_id = laptops.laptop_id";
    $sqlLaptop = mysqli_query($connection, $quiryLaptop);

?>