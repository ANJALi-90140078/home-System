<?php
include '../db/dbconnect.php';
session_start();


//insert category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $category_name = $_POST['categoryname'];

    // check whether category exist or not
    $existsql = "SELECT * FROM `category` where category_name ='$category_name' ";
    $existresult = mysqli_query($conn, $existsql);

    $numexist = mysqli_num_rows($existresult);
    if ($numexist > 0) {
        $_SESSION['statusfail'] = "Category is already existing.";
        header("location: category_view.php");
    } else {
        //INSERT CATEGORY QUERY
        $input = "INSERT INTO `category` (`category_id`, `category_name`) VALUES ('', '$category_name')";
        $inputresult = mysqli_query($conn, $input);
        //ALERT OR ERROR!
        if ($inputresult) {
            $_SESSION['status'] = "Category Inserted Successfully.";
            header("location: category_view.php");
            // $showAlert = "Category Inserted Successfully.";
        } else {
            $_SESSION['statusfail'] = "Category not inserted.";
            header("location: category_view.php");
        }
    }
}
?>