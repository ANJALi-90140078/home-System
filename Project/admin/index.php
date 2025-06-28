<?php
include('includes/authadmin.php'); 
include('includes/header.php'); 
include('includes/navbar.php');

?>

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
    <a href="generatereport.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Income (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT sum(P_AMOUNT) as sum FROM payment where MONTH(P_DATE)= MONTH(NOW()) and YEAR(P_DATE)=YEAR(now())";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>"."₹".$row['sum']."</b>"."</h4>";
                       
                            }
                        } else {
                            echo "0";
                        }
                        ?>

               <!-- <h4>$21234</h4> -->

              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Expenses (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                
              <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT sum(E_AMOUNT) as sum FROM expense where MONTH(E_DATE)= MONTH(NOW()) and YEAR(E_DATE)=YEAR(now())";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>"."₹".$row['sum']."</b>"."</h4>";
                       
                            }
                        } else {
                            echo "0";
                        }
                        ?>


              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total House :</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  
                  <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT count(H_ID) as hid FROM house";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>".$row['hid']."</b>"."</h4>";
                       
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
              <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Allocated House :</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                
              <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT count(distinct HOUSE_H_ID) as hid FROM member";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>".$row['hid']."</b>"."</h4>";
                       
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
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
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">UnSolved Complaints</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">


          <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT count(C_ID) as cid FROM complaint where C_STATUS='Pending' and MONTH(C_DATE)= MONTH(NOW()) and YEAR(C_DATE)=YEAR(now())";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>".$row['cid']."</b>"."</h4>";
                       
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

           <!-- <h4>4</h4> -->

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-file fa-2x text-gray-300"></i>
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
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">InProgress Complaints</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
          
          <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT count(C_ID) as cid FROM complaint where C_STATUS='Inprogress' and MONTH(C_DATE)= MONTH(NOW()) and YEAR(C_DATE)=YEAR(now())";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>".$row['cid']."</b>"."</h4>";
                       
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

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Solved Complaints</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                
              <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

                        
                        $sql = "SELECT count(C_ID) as cid FROM complaint where C_STATUS='Solved' and MONTH(C_DATE)= MONTH(NOW()) and YEAR(C_DATE)=YEAR(now())";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>".$row['cid']."</b>"."</h4>";
                       
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
          <i class="fas fa-check fa-2x text-gray-300"></i>
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
          <div class="text-xs font-weight-bold text-sucsess text-uppercase mb-1">Total Complaints</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            
          <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT count(C_ID) as cid FROM complaint where MONTH(C_DATE)= MONTH(NOW()) and YEAR(C_DATE)=YEAR(now())";
                        $chk = mysqli_query($con, $sql);

    
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                       
                        
                          echo "<h4>"."<b>".$row['cid']."</b>"."</h4>";
                       
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>


          </div>
        </div>
        <div class="col-auto">
        <i class="fas fa-paperclip fa-2x text-gray-300"></i>
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