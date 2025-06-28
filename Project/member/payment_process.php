<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if(isset($_POST['payment_id'])) 
{
    $payment_id = $_POST['payment_id'];
    $amount = $_POST['amount'];
    $ptype = $_POST['ptype'];
    $mid = $_SESSION["mid"];
    $hid = $_SESSION["hid"];


    $query = mysqli_query($con,"INSERT INTO payment(PAYMENT_ID,P_DATE,P_TYPE,P_AMOUNT,MEMBER_M_ID,HOUSE_H_ID) 
    VALUES('$payment_id',now(),'$ptype','$amount','$mid','$hid')");
   
    if($query){
        echo "Data inserted";
    }
    else{
        echo "Data not inserted";
    }
}
?>