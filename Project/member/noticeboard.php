<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bolder text-dark">Noticeboard</h6>
    </div>

    <div class="card-body">


      <div class="table-responsive">
        <?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
$sql = "SELECT * FROM notice order by NOTICE_ID DESC";
$chk = mysqli_query($con, $sql);

?>

        <table class="table table-bordered table table-hover table" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> Date </th>
              <th> Subject </th>
              <th>Description </th>
            </tr>
          </thead>
          <tbody>
            <?php

     if (mysqli_num_rows($chk) > 0) {
       while ($row = mysqli_fetch_assoc($chk)) {
     ?>

 

<?php
$date = $row['NOTICE_DATE'];
$dateformate = date_format(new DateTime($date), "d-m-Y");

?>
            <tr>
              <td><b><?php echo $dateformate; ?></b> </td>
              <td><b><?php echo $row['NOTICE_SUBJECT']; ?> </b></td>
              <td><b><?php echo $row['NOTICE_DESCRIPTION']; ?> </b></td>
            </tr>
            <?php
       }
     } else {
       echo "No Record Found";
     }
          ?>
           

          </tbody>
        </table>

      </div>







    </div>
  </div>

</div>

<?php
include('includes/scripts.php');
?>