<?php
    $servername = "localhost";
    $username = "id20362457_mohil";
    $password = "Q+{0mP!U0s_<]4u|";
    $database = "id20362457_userdata";

    $connection = mysqli_connect($servername, $username, $password, $database);
    
    if($connection){
        echo "DB Connected";
    }
?>