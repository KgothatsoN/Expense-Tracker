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
            echo "Successfully Added Item!";
        }
        else
        {
            echo "Error!";
        }
    }
    else
    {
        textNode("success", "Missing Information!");
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
    $element = "<h6 class='$classname'>$msg</6>";
    echo $element;
}