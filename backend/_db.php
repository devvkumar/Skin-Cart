<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "mobileskin";

    session_start();

    $conn = mysqli_connect($server, $username, $password, $database);

    // if($conn){
    //     echo "connected";
    // } 
?>