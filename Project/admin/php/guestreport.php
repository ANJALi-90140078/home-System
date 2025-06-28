<?php
session_start();
require('../vendor1/autoload.php');
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['paymentbtn'])) {
    $from = $_SESSION["from"];
    $to = $_SESSION["to"];

    $sql = "SELECT `guest`.*, `house`.*, `security_person`.*
    FROM `guest` 
        LEFT JOIN `house` ON `guest`.`HOUSE_H_ID` = `house`.`H_ID` 
        LEFT JOIN `security_person` ON `guest`.`SP_ID` = `security_person`.`S_ID` 
    where DATE(G_ARRIVAL) BETWEEN '$from' AND '$to' and G_STATUS='Allowed' or G_STATUS='Denied' order by G_ID DESC";

    $chk = mysqli_query($con, $sql);

    $date = $from;
    $dateformate = date_format(new DateTime($date), "d-m-Y");

    $date1 = $to;
    $dateformate1 = date_format(new DateTime($date1), "d-m-Y");


    $html = '<style>table, th, td {border:1px solid black; border-collapse: collapse;};</style><h2 style="margin-left: 4rem;"> Guest Report From <b>' . $dateformate . '</b> To <b>' . $dateformate1 . '</b></h2><br><br>';
    $html .= '<table class="table" width=100% align="center" cellspacing=15 cellpadding=15>';

    $html .= '<tr>

    <th>House Number</th>
    <th>Guest Name</th>
    <th>Guest Contact</th>
    <th>Arrival Time</th>
    <th>Total Guest</th>
    <th>Guest Type</th>
    <th>Allowed/Denied By</th>
    <th>Entry</th>
        
        </tr>';

    if (mysqli_num_rows($chk) > 0) {
        while ($row = mysqli_fetch_assoc($chk)) {

            $date = $row['G_ARRIVAL'];
            $dateformate = date_format(new DateTime($date), "d-m-Y h:i A");


            $html .= '<tr>
    
            
    <td>' .  $row['H_NO']    . '</td>
    <td>' .  $row['G_NAME'] . '</td>
    <td>' .  $row['G_CONTACT'] . '</td>
    <td>' .  $dateformate    . '</td>
    <td>' .  $row['G_NO'] . '</td>
    <td>' .  $row['G_TYPE'] . '</td>
    <td>' .  $row['S_F_NAME'] . '</td>
    <td>' .  $row['G_STATUS'] . '</td>
   
    


    </tr>';
        }
    }



    $html .= '</table>';
} else {
    $html = "Data not found";
}



$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = time() . '.pdf';
$mpdf->output($file, 'I');
