<?php
session_start();
require('../vendor1/autoload.php');
include '../db/dbconnect.php';
// $con = mysqli_connect("localhost", "root", "", "hs") or die("Connection Failed...");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['invoice'])) {

    $html = '
        
        <style>
        /* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}


/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 90%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 Open Sans, sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 90%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 10%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: left; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }
table.inventory td:nth-child(6) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
    </style>
    
    ';





    $order_id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];

    $query1 = "SELECT * FROM `order_master` WHERE `order_id` = $order_id";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
      while ($row1 = mysqli_fetch_assoc($result1)) {
        $order_id = $row1['order_id'];
        $full_name = $row1['full_name'];
        $delivery_address = $row1['address'];
        $phone = $row1['phone'];
        $pay_mode = $row1['pay_mode'];
        $total = $row1['total'];
        $order_date = $row1['order_date'];
        $due_date = $row1['due_date'];
        $estimated_date = date('j F, Y g:i A', strtotime($due_date));
        $real_order_date = date('j F, Y', strtotime($order_date));



        $html .= '
<div style=" padding:70px;">
        <img src="../img/black-logo.jpg" alt="Invoice" style="width:200px;"/><br><br>


      <header>
        <h1>Invoice</h1>
          <address contenteditable>
            <h4 style="text-transform: uppercase;">' . $full_name . '</h4>
            <h4>' . $delivery_address . '<br></h4>
            <h4>' . $phone . '</h4>
          </address>
      </header>


      <article>
      
        <table class="meta">
          <tr>
            <th><span contenteditable>Invoice #</span></th>
            <td><span contenteditable>' . $order_id . '</span></td>
          </tr>
          <tr>
            <th><span contenteditable>Order Date</span></th>
            <td><span contenteditable>' . $real_order_date . '</span></td>
          </tr>
          <tr>
            <th><span contenteditable>Delivery Date</span></th>
            <td><span id="prefix" contenteditable>  </span><span>' . $estimated_date . '</span></td>
          </tr>
        </table>

        <table class="inventory">
          <thead>
            <tr>
              <th><span contenteditable>Sno.</span></th>
              <th><span contenteditable>Service</span></th>
              <th><span contenteditable>Service Provider</span></th>
              <th><span contenteditable>Rate</span></th>
              <th><span contenteditable>Quantity</span></th>
              <th><span contenteditable>Price</span></th>
            </tr>
          </thead>
          <tbody>
          ' .
          $sno = 0;
        $query2 = "SELECT * FROM `user_order` WHERE `order_id` = $order_id";
        $result2 = mysqli_query($conn, $query2);
        if ($result2) {
          while ($row2 = mysqli_fetch_assoc($result2)) {
            $service_title = $row2['service_title'];
            $price = $row2['price'];
            $qty = $row2['qty'];
            $status = $row2['status'];
            $sp_id = $row2['sp_id'];
            $sno += 1;

            $spname = "SELECT * FROM `sp` WHERE sp_id = $sp_id";
            $spname_result = mysqli_query($conn, $spname);
            while ($sprow = mysqli_fetch_assoc($spname_result)) {
              $sp_name = $sprow['sp_name'];
              $phone = $sprow['phone'];
              // $paid=3000;
            }

            $html .= ' <tr>
              <td><a class="cut"></a><span contenteditable>' . $sno . '</span></td>
              <td><a class="cut"></a><span contenteditable>' . $service_title . '</span></td>
              <td><span contenteditable>'. $sp_name .'</span></td>
              <td><span data-prefix>&#8377;</span><span contenteditable>'. $price.'</span></td>
              <td><span contenteditable>'.$qty.'</span></td>
              <td><span data-prefix>&#8377;</span><span>'. $qty*$price . '</span></td>
            </tr>
           ';
          } //while row2 end
        } // if result 2 end

        $html .= '</tbody>
        </table>
        
        <table class="balance">
          <tr>
            <th><span contenteditable>Total</span></th>
            <td><span data-prefix>&#8377;</span><span>'. $total .'</span></td>
          </tr>
          <tr>
            <th><span contenteditable>Payment mode</span></th>
            <td><span data-prefix></span><span>'. $pay_mode.  ' </span></td>
          </tr>
          <tr>
            <th><span contenteditable>Amount Paid</span></th>
            <td><span data-prefix>&#8377;</span><span contenteditable>'.$total.'</span></td>
          </tr>
        </table>
      </article>

</div>


    <br><br>';
      } //while result1 end
    } //if result1 end

 


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
