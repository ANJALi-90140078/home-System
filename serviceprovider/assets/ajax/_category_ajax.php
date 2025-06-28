<?php

include '../../../db/dbconnect.php';

$category_id = $_POST['category_id'];
echo $category_id;

$servicesql = "SELECT * FROM `service` WHERE category_id = '$category_id'";
$result = mysqli_query($conn, $servicesql);

$output = '<option selected disabled>select service</option>';
while($service_row = mysqli_fetch_assoc($result)){
    $output .= '<option value="'.$service_row['service_id'].'">'.$service_row['service_name'].'</option>';
}
echo $output;
?>