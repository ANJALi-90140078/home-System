<?php
session_start();
require('../vendor1/autoload.php');
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['paymentbtn'])) {
    $from = $_SESSION["from"];
    $to = $_SESSION["to"];

    $sql = "SELECT `member`.*, `house`.*, `complaint`.* FROM `member` 
                LEFT JOIN `house` ON `member`.`HOUSE_H_ID` = `house`.`H_ID` 
                LEFT JOIN `complaint` ON `complaint`.`MEMBER_M_ID` = `member`.`M_ID` 
                where DATE(C_DATE) BETWEEN '$from' AND '$to' order by C_ID DESC";

    $chk = mysqli_query($con, $sql);

    $date = $from;
    $dateformate = date_format(new DateTime($date), "d-m-Y");

    $date1 = $to;
    $dateformate1 = date_format(new DateTime($date1), "d-m-Y");


    $html = '<style>table, th, td {border:1px solid black; border-collapse: collapse;};</style><h2 style="margin-left: 4rem;"> Complaint Report From <b>' . $dateformate . '</b> To <b>' . $dateformate1 . '</b></h2><br><br>';
    $html .= '<table class="table" width=100% align="center" cellspacing=15 cellpadding=15>';

    $html .= '<tr>

                            <th>Date</th>
                            <th>Subject</th>
                            <th>Details</th>
                            <th>Name</th>
                            <th>House Number</th>
                            <th>Status</th>
        
        </tr>';

    if (mysqli_num_rows($chk) > 0) {
        while ($row = mysqli_fetch_assoc($chk)) {

            $date = $row['C_DATE'];
            $dateformate = date_format(new DateTime($date), "d-m-Y");


            $html .= '<tr>
    
            <td>' .  $dateformate    . '</td>
    <td>' .  $row['C_SUBJECT']    . '</td>
    <td>' .  $row['C_DETAILS'] . '</td>
    <td>' .  $row['M_F_NAME'] . '</td>
    <td>' .  $row['H_NO'] . '</td>
    <td>' .  $row['C_STATUS'] . '</td>
   
 
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
