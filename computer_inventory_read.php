<?php 
require('./database.php');

    $quiryComputers = "SELECT computers.computer_id, users.department, users.firstname, users.lastname, computers.os_version, computers.processor, computers.date_aquired, computers.ip_address
                        FROM users
                        RIGHT JOIN computers ON users.computer_id = computers.computer_id";
    $sqlComputers = mysqli_query($connection, $quiryComputers);

?>