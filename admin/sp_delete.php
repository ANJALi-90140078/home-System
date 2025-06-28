<?php
include '../db/dbconnect.php';
session_start();


$data = false;
if (isset($_GET['spid']) && isset($_GET['loginid'])) {
    $sp_id = $_GET['spid'];
    $login_id = $_GET['loginid'];
    echo $login_id;

    $sql = "DELETE FROM `sp` WHERE `sp`.`sp_id` = $sp_id";
    $result = mysqli_query($conn, $sql);
    $sql2 = "DELETE FROM `login` WHERE `login`.`login_id` = $login_id";
    $result2 = mysqli_query($conn, $sql2);
    if ( $result && $result2 ) {
        $_SESSION['status'] = "Service Provider is deleted successfully.";
        header("location: sp_view.php");
    } else {
        echo 'error';
        $_SESSION['statusfail'] = "Sorry, Service Provider is not deleted.";
        header("location: sp_view.php");
    }
}
