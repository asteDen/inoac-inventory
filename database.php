<?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'inoac_db';


        try{
            $connection = mysqli_connect($host, $user, $password, $database);
            if($connection){
                // echo "Connected";
            }
        }catch (Exception $errormsg) {
            echo $errormsg->getMessage();
            
        }

?>