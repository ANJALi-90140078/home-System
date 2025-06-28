<?php
include '../db/dbconnect.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $selectcategory = $_POST['selectcategory'];
    $updatedcategory = $_POST['updatedcategory'];
    // $name = $_POST[''];

    // check whether category already exist or not
    $existsql = "SELECT * FROM `category` where category_name ='$updatedcategory' ";
    $existresult = mysqli_query($conn, $existsql);

    $numexist = mysqli_num_rows($existresult);
    if ($numexist > 0) {
        $_SESSION['statusfail'] = "Category is already existing.";
        header("location: category_view.php");
    } else {
        $input = "UPDATE `category` SET `category_name` = '$updatedcategory' WHERE `category`.`category_name` = '$selectcategory';";
        $inresult = mysqli_query($conn, $input);
        if ($inresult) {
            $_SESSION['status'] = "Category is updated successfully.";
            header("location: category_view.php");
        } else {
            $_SESSION['statusfail'] = "Sorry, Category is not updated.";
            header("location: category_view.php");
        }
    }
}
