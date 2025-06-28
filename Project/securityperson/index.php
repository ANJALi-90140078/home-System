<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');

?>

<link rel="icon" type="image/x-icon" href="../images/FAVICON.ico">
<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pre-Invited Guest</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php
              $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
              $sql = "SELECT count(G_ID) as sum FROM guest where G_TYPE='Pre-Invited' 
                        and MONTH(G_ARRIVAL)= MONTH(NOW()) and YEAR(G_ARRIVAL)=YEAR(now())";
              $chk = mysqli_query($con, $sql);

              if (mysqli_num_rows($chk) > 0) {
                while ($row = mysqli_fetch_assoc($chk)) {


                  echo "<h4>" . "<b>" . $row['sum'] . "</b>" . "</h4>";

                }
              } else {
                echo "No Record Found";
              }
              ?>

            

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Normal Guest</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php
              $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
              $sql = "SELECT count(G_ID) as sum FROM guest where G_TYPE='Normal' 
              and MONTH(G_ARRIVAL)= MONTH(NOW()) and YEAR(G_ARRIVAL)=YEAR(now())";
              $chk = mysqli_query($con, $sql);


              if (mysqli_num_rows($chk) > 0) {
                while ($row = mysqli_fetch_assoc($chk)) {


                  echo "<h4>" . "<b>". $row['sum'] . "</b>" . "</h4>";

                }
              } else {
                echo "No Record Found";
              }
              ?>


              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Guest</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                    <?php
                  $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                  $sql = "SELECT count(G_ID) as sum FROM guest where G_STATUS='Pending' 
                  and MONTH(G_ARRIVAL)= MONTH(NOW()) and YEAR(G_ARRIVAL)=YEAR(now())";
                  $chk = mysqli_query($con, $sql);


                  if (mysqli_num_rows($chk) > 0) {
                    while ($row = mysqli_fetch_assoc($chk)) {


                      echo "<h4>" . "<b>" . $row['sum'] . "</b>" . "</h4>";

                    }
                  } else {
                    echo "No Record Found";
                  }
                  ?>


                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-exclamation fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">All Guest</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php
              $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
              $sql = "SELECT count(G_ID) as sum FROM guest where 
              MONTH(G_ARRIVAL)= MONTH(NOW()) and YEAR(G_ARRIVAL)=YEAR(now())";
              $chk = mysqli_query($con, $sql);


              if (mysqli_num_rows($chk) > 0) {
                while ($row = mysqli_fetch_assoc($chk)) {


                  echo "<h4>" . "<b>" . $row['sum'] . "</b>" . "</h4>";

                }
              } else {
                echo "No Record Found";
              }
              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-plus fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Allowed Entry</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


                <?php
          $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
          $sql = "SELECT count(G_ID) as sum FROM guest where G_STATUS='Allowed' 
          and MONTH(G_ARRIVAL)= MONTH(NOW()) and YEAR(G_ARRIVAL)=YEAR(now())";
          $chk = mysqli_query($con, $sql);


          if (mysqli_num_rows($chk) > 0) {
            while ($row = mysqli_fetch_assoc($chk)) {


              echo "<h4>" . "<b>" . $row['sum'] . "</b>" . "</h4>";

            }
          } else {
            echo "No Record Found";
          }
          ?>

                <!-- <h4>4</h4> -->

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Denied Entry</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php
          $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
          $sql = "SELECT count(G_ID) as sum FROM guest where G_STATUS='Denied' 
          and MONTH(G_ARRIVAL)= MONTH(NOW()) and YEAR(G_ARRIVAL)=YEAR(now())";
          $chk = mysqli_query($con, $sql);


          if (mysqli_num_rows($chk) > 0) {
            while ($row = mysqli_fetch_assoc($chk)) {


              echo "<h4>" . "<b>" . $row['sum'] . "</b>" . "</h4>";

            }
          } else {
            echo "No Record Found";
          }
          ?>


              </div>
            </div>
            <div class="col-auto">
            
            <i class="fas fa-exclamation fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

  <!-- Content Row -->

  <?php
  include('includes/scripts.php');
  // include('includes/footer.php');
  ?>