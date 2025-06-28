<?php
include '../db/dbconnect.php';
session_start();


$data = false;
if(isset($_GET['deleteid'])){
    $category_id = $_GET['deleteid'];
    // echo $category_id;
    $sql = "DELETE FROM `category` WHERE `category`.`category_id` = $category_id";
    $result = mysqli_query($conn,$sql);
    if ($result){
        $_SESSION['status'] = "Category is deleted successfully.";
        header("location: category_view.php");
    }else{
        $_SESSION['statusfail'] = "Sorry, Category is not deleted.";
        header("location: category_view.php");
    }
}
?>