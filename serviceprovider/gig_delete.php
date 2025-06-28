<?php
include '../db/dbconnect.php';
session_start();


$data = false;
if(isset($_GET['service_id'], $_GET['sp_id'])){
    $service_id = $_GET['service_id'];
    $sp_id = $_GET['sp_id'];
    // echo $service_id;
    // echo $sp_id;
    $sql = "DELETE FROM `sp_service` WHERE `sp_service`.`sp_id` = $sp_id AND `service_id` = $service_id";
    $result = mysqli_query($conn,$sql);
    if ($result){
        $_SESSION['status'] = "Gig deleted successfully.";
        header("location: gig_view.php");
    }else{
        $_SESSION['statusfail'] = "Sorry, Gig is not deleted.";
        header("location: gig_view.php");
    }
}
?>