<?php

require_once("db.php");
require_once("component.php");

$con = createDb();

//Create button function

if(isset($_POST['create'])){
    createData();
}



function createData(){
    $item = inputValue("item_name");
    $price = inputValue("price");
    $date = inputValue("date");

    if($item && $price && $date){
        $sql = "INSERT INTO expenses(item_name, price, date)
                VALUES('$item','$price','$date')";
        
        if (mysqli_query($GLOBALS['con'], $sql)){
            textNode("success", "Successfully Added!");
        }
        else
        {
            echo "Error!";
        }
    }
    else
    {
        textNode("error", "Missing Information!");
    }
}

function inputValue($value){
    $inputbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));

    if(empty($inputbox)){
        return false;
    }
    else
    {
        return $inputbox;
    }
}

//Error messages
function textNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//Fect data from db
function getData(){
    $sql ="SELECT * FROM expenses";

    $result = mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}