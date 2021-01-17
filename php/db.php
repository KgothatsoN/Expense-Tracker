<?php

function createDb() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "expensetracker";

    //Create MySql connection
    $con = mysqli_connect($servername,$username,$password);

    //Check connection
    if(!$con){
        die("Connection Failed: ".mysqli_connect_error());
    }

    //Create DB

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername,$username,$password,$dbname);

        //Create New Table in Database
        $sql = "
                CREATE TABLE IF NOT EXISTS expenses(
                    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    item_name VARCHAR(25) NOT NULL,
                    price FLOAT,
                    date VARCHAR (15)              
                );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }
        else
        {
            echo "Unable to Create Table!";
        }
    }
    else
    {
        echo "Error! Database Not Created!".mysqli_error($con);
    }
}