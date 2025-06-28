<?php
if(!defined('MYSITE')){
  header('location: ../customer_index.php');
  die();
}
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: ../index.php");
  exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- After Sass custom variable new BOOTSTRAP-->
    <link rel="stylesheet" href="<?= $css_directory ?> ">
    <link rel="stylesheet" href="<?= $css_directory2 ?> ">  

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    
        <title> <?php echo $title; ?> - Home services</title>
</head>
