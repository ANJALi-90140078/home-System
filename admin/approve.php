<?php
include '../db/dbconnect.php';
session_start();


$data = false;
if (isset($_GET['spid']) && isset($_GET['status'])) {
    $sp_id = $_GET['spid'];
    $status = $_GET['status'];
    // echo $sp_id;
    // echo $status;
    // echo "<BR>";

    if ($status == 'deactive') {
        echo $sp_id;
        $sql = "UPDATE `sp` SET `status` = 'active' WHERE `sp`.`sp_id` = $sp_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "done";
            $_SESSION['status'] = "Service Provider is Activated successfully.";
            header("location: sp_view.php");
        }
        else {
            // echo "not done";
            $_SESSION['statusfail'] = "Sorry, Service Provider is not Activated.";
            header("location: sp_view.php");
        }
    }

    if ($status == 'active') {
        echo $sp_id;
        $sql = "UPDATE `sp` SET `status` = 'deactive' WHERE `sp`.`sp_id` = $sp_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "done";
            $_SESSION['status'] = "Service Provider is Deactivated successfully.";
            header("location: sp_view.php");
        }
        else {
            // echo "not done";
            $_SESSION['statusfail'] = "Sorry, Service Provider is not Deactived.";
            header("location: sp_view.php");
        }
    }
    

}
