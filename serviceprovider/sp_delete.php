<?php
include '../db/dbconnect.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `category` WHERE `category`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    if ($result){
        echo 'success delete';
    }else{
        echo 'not delete';
    }
    header("location: category_view.php");
}
?>