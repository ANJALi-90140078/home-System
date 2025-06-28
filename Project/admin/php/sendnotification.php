<?php

$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {

    $id = $_POST['editid'];
    $date = date('Y-m-d');
    $msg = $_POST['msg'];
    $number = '91'.$_POST['contact'];
   
    $sql = "INSERT INTO notification1(N_DATE,N_DESC,MEMBER_M_ID) VALUES ('$date','$msg','$id')";
    $chek_insert = mysqli_query($con, $sql);

    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('Notification Sended ');</script>";
       echo "<script type='text/javascript'> document.location = '../send_notification.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../send_notification.php'; </script>";
    }

	require('textlocal.class.php');
	//include("php-in/textlocal.class.php");
	
	// Account details
	$apiKey = urlencode('NDU2MTQ4NTUzMDQxNDc2NTZjNDc0NTRhNmU2YjY5NGI=');
	
	// Message details
	$numbers = array($number);
	$sender = urlencode('600010');
	$message = rawurlencode("Hi there, thank you for sending your first test message from Textlocal. Get 20% off today with our code: $msg.");
	
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	//echo $response;


    mysqli_close($con);
}
?>