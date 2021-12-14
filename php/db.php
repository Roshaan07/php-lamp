<?php

function Createdb(){
    $servername = "database-2.cybiswmg96ur.ap-south-1.rds.amazonaws.com";
    $username = "admin";
    $password = "admin1234";
    $dbname = "bookstore";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS books(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            book_name VARCHAR (25) NOT NULL,
                            book_publisher VARCHAR (20),
                            book_price FLOAT 
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
