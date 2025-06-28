<?php
session_start();
require('../vendor1/autoload.php');
include '../db/dbconnect.php';
// $con = mysqli_connect("localhost", "root", "", "hs") or die("Connection Failed...");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['customer_report_city_wise'])) {
        // $from = date('Y-m-d h:i:s');;
        // $to = date('Y-m-d h:i:s');

        $city_name = $_POST['selectcity'];

        $query1 = "SELECT * FROM `city` where city_name ='$city_name' ";
        $result1 = mysqli_query($conn, $query1);
        if($result1){
            while($city_row = mysqli_fetch_assoc($result1)){
                $city_id = $city_row['city_id'];
            }
        }


        // $sql = "SELECT `guest`.*, `house`.*, `security_person`.*
        // FROM `guest` 
        //     LEFT JOIN `house` ON `guest`.`HOUSE_H_ID` = `house`.`H_ID` 
        //     LEFT JOIN `security_person` ON `guest`.`SP_ID` = `security_person`.`S_ID` 
        // where DATE(G_ARRIVAL) BETWEEN '$from' AND '$to' and G_STATUS='Allowed' or G_STATUS='Denied' order by G_ID DESC";

        $sno =0;
        $sql = "SELECT * FROM `customer` WHERE city_id = $city_id";
        $chk = mysqli_query($conn, $sql);

        // $date = $from;
        // $dateformate = date_format(new DateTime($date), "d-m-Y");

        // $date1 = $to;
        // $dateformate1 = date_format(new DateTime($date1), "d-m-Y");


        // $html = '<style>table, th, td {border:1px solid black; border-collapse: collapse;};</style>
        // <h2 style="margin-left: 4rem;"> Guest Report From <b>' . $dateformate . '</b> To <b>' . $dateformate1 . '</b></h2><br><br>';
        // $html .= '<table class="table" width=100% align="center" cellspacing=15 cellpadding=15>';
        $html = '<style>table, th, td {border:1px solid black; border-collapse: collapse;};</style>';

        $html .= '

        <img src="../img/black-logo.jpg" alt="Invoice" style="width:200px;"/><br><br>
        <div style="background-color:black; hight:200px; width:100%;">
        </div>

    <!--Invoice-->
    <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm lh-sm">
        <h2 class="m-3">Customer report</h2>
        
        <h2><strong>City - '.$city_name.'</strong></h2>

        <div class="row mt-3 mb-4">
    
    </div>
    <!--/Invoice-->

    <br><br>';
        $html .= '<table class="table" width=100% align="center" cellspacing=15 cellpadding=15>';

        $html .= '<tr>

    <th>Sno.</th>
    <th>Custoer Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
        
        </tr>';


        if (mysqli_num_rows($chk) > 0) {
            while ($row = mysqli_fetch_assoc($chk)) {
                // $date = $row['G_ARRIVAL'];
                // $dateformate = date_format(new DateTime($date), "d-m-Y h:i A");
                $sno+=1;

                $html .= '<tr>
    
            
            <td>' .  $sno . '</td>
            <td>' .  $row['first_name'].' '. $row['last_name']     . '</td>
            <td>' .  $row['email'] . '</td>
            <td>' .  $row['phone'] . '</td>
            <td>' .  $row['address'] . '</td>
   
    


    </tr>';
            }
        }else{
            $html .=  '<tr>
            <td colspan="6">
            No any Customer in '.$city_name.'.
            </td>
            </tr>';
           
        }



        $html .= '</table>';
    } else {
        $html .= "<h3>Data not found<h3>";
    }
}else{
    echo "There are not POST method";
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = time() . '.pdf';
$mpdf->output($file, 'I');
