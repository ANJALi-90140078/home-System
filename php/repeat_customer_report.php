<?php
session_start();
require('../vendor1/autoload.php');
include '../db/dbconnect.php';
// $con = mysqli_connect("localhost", "root", "", "hs") or die("Connection Failed...");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['repeat_customer_report'])) {
        // $from = date('Y-m-d h:i:s');;
        // $to = date('Y-m-d h:i:s');


        $sno = 0;

        $sql = "SELECT *
        FROM `customer`
        WHERE `customer_id` IN (
          SELECT `customer_id`
          FROM `order_master`
          GROUP BY `customer_id`
          HAVING COUNT(*) > 1
        ) ";
        $chk = mysqli_query($conn, $sql);



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
        <h2 class="m-3">Repeat Customer report</h2>
        
        <div class="row mt-3 mb-4">
    
    </div>
    <!--/Invoice-->

    <br><br>';
        $html .= '<table class="table" width=100% align="center" cellspacing=15 cellpadding=15>';

        $html .= '<tr>

    <th>Sno.</th>
    <th>Customer name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Pincode</th>
        
        </tr>';


        if (mysqli_num_rows($chk) > 0) {
            while ($row = mysqli_fetch_assoc($chk)) {
                // $date = $row['G_ARRIVAL'];
                // $dateformate = date_format(new DateTime($date), "d-m-Y h:i A");
                $sno += 1;

                $html .= '<tr>
    
            
            <td>' .  $sno . '</td>
            <td>' .  $row['first_name']    . ' '.$row['last_name'].'</td>
            <td>' .  $row['email'] . '</td>
            <td>' .  $row['phone'] . '</td>
            <td>' .  $row['address'] . '</td>
            <td>' .  $row['pincode'] . '</td>
   
    


    </tr>';
            }
        } else {
            $html .=  '<tr>
            <td colspan="6">
            No any Service provider in.
            </td>
            </tr>';
        }



        $html .= '</table>';
    } else {
        $html .= "<h3>Data not found<h3>";
    }
} else {
    echo "There are not POST method";
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = time() . '.pdf';
$mpdf->output($file, 'I');
