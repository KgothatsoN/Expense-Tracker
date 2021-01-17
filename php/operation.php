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

//Set ID to textbox
function setID(){
    $getid = getData();
    $id = 0;

    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id+1);
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

// Update Button
if(isset($_POST['update'])){
    updateData();  
}

function updateData(){
    $id = inputValue("item_id");
    $item = inputValue("item_name");
    $price = inputValue("price");
    $date = inputValue("date");

    if($item && $price && $date){
        $sql = "
                    UPDATE expenses SET item_name='$item', price = '$price', date = '$date' WHERE id='$id';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            textNode("success", "Changes Successful!");
        }else{
            textNode("error", "Error! Unable to Save Changes!");
        }

    }else{
        textNode("error", "Use Edit Icon to Select Items!");
    }
}

// Delete Button
if(isset($_POST['delete'])){
    deleteRecord();
}

//Delete selected record
function deleteRecord(){
    $item = (int)inputValue("item_id");

    if($item){
        $sql = "DELETE FROM expenses WHERE id=$item";

        if(mysqli_query($GLOBALS['con'],$sql)){
            textNode("success", "Item Deleted!");
        }
        else
        {
            textNode("error", "Unable to Delete Record!");
        }


    }
    else
    {
        textNode("error", "Please Select Item for Deletion...");
    }
    
}
//
if(isset($_POST['deleteAll'])){
    deleteAll();
}
//Create Delete All Button
function deleteBtn(){
    $result = getData();
    $i = 0;

    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteAll", "btn btn-danger", "<i class='fa fa-exclamation-triangle'></i> Delete All", "deleteAll","");
                return;
            }    
        }
    }
}
// Delete All Records
function deleteAll(){
    $sql = "DROP TABLE expenses";

    if(mysqli_query($GLOBALS['con'],$sql)){
        textNode("success", "All Items Deleted...!");
        createDb();
    }
    else{
        textNode("error","Error! Unable to delete all items...!");
    }
}