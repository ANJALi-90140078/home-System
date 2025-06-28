<?php
include '../db/dbconnect.php';
session_start();


$data = false;
if(isset($_GET['deleteid'])){
    $service_id = $_GET['deleteid'];
    // echo $service_id;
    $sql = "DELETE FROM `service` WHERE `service`.`service_id` = $service_id";
    $result = mysqli_query($conn,$sql);
    if ($result){
        $_SESSION['status'] = "Service is deleted successfully.";
        header("location: service_view.php");
    }else{
        $_SESSION['statusfail'] = "Sorry, service is not deleted.";
        header("location: service_view.php");
    }
}
?>