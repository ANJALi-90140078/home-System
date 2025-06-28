<?php
session_start();
require('../vendor1/autoload.php');
include '../db/dbconnect.php';
// $con = mysqli_connect("localhost", "root", "", "hs") or die("Connection Failed...");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sp_report_category_wise'])) {
        $from = date('Y-m-d h:i:s');;
        $to = date('Y-m-d h:i:s');

        $category_name = $_POST['selectcategory'];

        $query1 = "SELECT * FROM `category` where category_name ='$category_name' ";
        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            while ($category_row = mysqli_fetch_assoc($result1)) {
                $category_id = $category_row['category_id'];
            }
        }


        // $sql = "SELECT `guest`.*, `house`.*, `security_person`.*
        // FROM `guest` 
        //     LEFT JOIN `house` ON `guest`.`HOUSE_H_ID` = `house`.`H_ID` 
        //     LEFT JOIN `security_person` ON `guest`.`SP_ID` = `security_person`.`S_ID` 
        // where DATE(G_ARRIVAL) BETWEEN '$from' AND '$to' and G_STATUS='Allowed' or G_STATUS='Denied' order by G_ID DESC";

        $sno = 0;
        $sql = "SELECT * FROM `sp_service` WHERE category_id = $category_id";
        $chk = mysqli_query($conn, $sql);

        $date = $from;
        $dateformate = date_format(new DateTime($date), "d-m-Y");

        $date1 = $to;
        $dateformate1 = date_format(new DateTime($date1), "d-m-Y");


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
        <h2 class="m-3">Service provider report</h2>
        
        <h2><strong>Category - ' . $category_name . '</strong></h2>

        <div class="row mt-3 mb-4">
    
    </div>
    <!--/Invoice-->

    <br><br>';
        $html .= '<table class="table" width=100% align="center" cellspacing=15 cellpadding=15>';

        $html .= '<tr>

    <th>Sno.</th>
    <th>SP Name</th>
    <th>Service</th>
    <th>Service Title</th>
    <th>Description</th>
    <th>Price</th>
        
        </tr>';


        if (mysqli_num_rows($chk) > 0) {
            while ($row = mysqli_fetch_assoc($chk)) {
                // $date = $row['G_ARRIVAL'];
                // $dateformate = date_format(new DateTime($date), "d-m-Y h:i A");
                $sno += 1;
                $sp_id = $row['sp_id'];
                $service_id = $row['service_id'];

                $sql2 = "SELECT * FROM `sp` WHERE sp_id = $sp_id";
                $chk2 = mysqli_query($conn, $sql2);
                if ($chk2) {
                    while ($sqlrow2 = mysqli_fetch_assoc($chk2)) {
                        $sp_name = $sqlrow2['sp_name'];
                    }
                }
                $sql3 = "SELECT * FROM `service` WHERE service_id= $service_id";
                $chk3 = mysqli_query($conn, $sql3);
                if($chk2){
                    while($sqlrow3 = mysqli_fetch_assoc($chk3)){
                        $service_name = $sqlrow3['service_name'];
                    }
                }


                $html .= '<tr>
    
            
            <td>' .  $sno . '</td>
            <td>' .  $sp_name    . '</td>
            <td>' .  $service_name . '</td>
            <td>' .  $row['service_title'] . '</td>
            <td>' .  $row['description'] . '</td>
            <td>' .  $row['price'] . '</td>
   
    


    </tr>';
            }
        } else {
            $html .=  '<tr>
            <td colspan="6">
            No any Service provider in ' . $category_name . '.
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
