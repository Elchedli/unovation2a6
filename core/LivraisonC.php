<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}


function createData(){
    $Depart = textboxValue("Depart");
    $add_dep= textboxValue("add_dep");
    $Arrive = textboxValue("Arrive");
    $add_arr= textboxValue("add_arr"); 
    $Date_env= textboxValue("Date_env");
    $qtt= textboxValue("qtt");

    if($Depart && $add_dep&& $Arrive && $add_arr && $Date_env && $qtt){

        $sql = "INSERT INTO livraison (Depart, add_dep, Arrive, add_arr, Date_env, qtt) 
                        VALUES ('$Depart','$add_dep','$Arrive','$add_arr','$Date_env','$qtt')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM livraison";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// update dat //book-id
function UpdateData(){
    $bookid = textboxValue("book_id");
    $Depart = textboxValue("Depart");
    $add_dep= textboxValue("add_dep");
    $Arrive = textboxValue("Arrive");
    $add_arr = textboxValue("add_arr");
    $Date_env = textboxValue("Date_env");
    $qtt = textboxValue("qtt");

    if($Depart && $add_dep&& $Arrive && $add_arr && $Date_env && $qtt){
        $sql = "
                    UPDATE livraison SET Depart= '$Depart', add_dep= '$add_dep', Arrive = '$Arrive', add_arr='$add_arr', Date_env='$Date_env', qtt='$qtt' WHERE id='$bookid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM livraison WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}


        









// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}








