<?php
session_start();
require('../vendor1/autoload.php');
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['paymentbtn'])) {
    $from = $_SESSION["from"];
    $to = $_SESSION["to"];

    $sql = "SELECT `member`.*, `house`.*, `payment`.* FROM `member` LEFT JOIN `house` ON `member`.`HOUSE_H_ID` = `house`.`H_ID` 
    LEFT JOIN `payment` ON `payment`.`HOUSE_H_ID` = `house`.`H_ID`
    WHERE payment.MEMBER_M_ID IS NOT NULL and member.HOUSE_H_ID is not null and
    payment.MEMBER_M_ID=member.M_ID and
    DATE(P_DATE) BETWEEN '$from' AND '$to' order by H_NO ASC;";

    $chk = mysqli_query($con, $sql);

    $date = $from;
    $dateformate = date_format(new DateTime($date), "d-m-Y");

    $date1 = $to;
    $dateformate1 = date_format(new DateTime($date1), "d-m-Y");


    $html = '<style>table, th, td {border:1px solid black; border-collapse: collapse;};</style><h2 style="margin-left: 4rem;"> Payment Report From <b>'.$dateformate.'</b> To <b>'.$dateformate1.'</b></h2><br><br>';
    $html .= '<table class="table" width=100% align="center" cellspacing=15 cellpadding=15>';

    $html .= '<tr>

                            <th>House Number</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Payment Type</th>
                            <th>Date</th>
                            <th>Amount</th>
        
        </tr>';

    if (mysqli_num_rows($chk) > 0) {
        while ($row = mysqli_fetch_assoc($chk)) {

            $date = $row['P_DATE'];
            $dateformate = date_format(new DateTime($date), "d-m-Y");

          
            $html .= '<tr>
    
    <td>' .  $row['H_NO']    . '</td>
    <td>' .  $row['M_F_NAME'] . '</td>
    <td>' .  $row['M_PHONE']  . '</td>
    <td>' .  $row['P_TYPE']   . '</td>
    <td>' .  $dateformate    . '</td>
    <td>' .  $row['P_AMOUNT']   . '</td>
 
    </tr>';

        }

    }
    
    $html .= '<tr>
    <td colspan="5">' . '<center>Total</center>' . '</td>
    <td>' . $_SESSION['sum'] . '</td>
    </tr>';



    $html .= '</table>';
} else {
    $html = "Data not found";
}



$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = time() . '.pdf';
$mpdf->output($file, 'I');
?>