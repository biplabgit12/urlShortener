<?php
    //Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shortener";
     $con = mysqli_connect($servername,$username,$password,$database);
     if (!$con) {
       echo "not Connected";
     }
   

// 