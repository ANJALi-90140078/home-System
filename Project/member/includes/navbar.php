<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <!-- <i class="fa-regular fa-user-tie"></i> -->
    </div>
    <div class="sidebar-brand-text">Welcome <?php echo $_SESSION["musername"]; ?></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>My Details</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="noticeboard.php">
      <i class="fas fa-fw fa-newspaper"></i>
      <span>Noticeboard</span></a>
  </li>

  <!-- <li class="nav-item">
  <a class="nav-link" href="notice.php">
    <i class="fas fa-fw fa-envelope"></i>
    <span>Make Complaints</span></a>
</li> -->

  <li class="nav-item">
    <a class="nav-link" href="preguest.php">
      <i class="fas fa-fw fa-address-card"></i>
      <span>Pre-Register Guest</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="message_box.php">
      <i class="fas fa-fw fa-address-card"></i>
      <span>Message Box</span></a>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-envelope"></i>
      <!-- <i class="fas fa-fw fa-house-blank"></i> -->
      <span>Complaint</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
        <a class="collapse-item" href="makecomplaint.php">Make Complaint</a>
        <a class="collapse-item" href="viewcomplaint.php">View Complaint</a>
      </div>
    </div>
  </li>


  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <!-- <i class="fas fa-fw fa-wrench"></i> -->
      <!-- <i class="fas fa-fw fa-file"></i> -->
      <i class="fas fa-fw fa-money-bill"></i>
      <span>Payments</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
        <a class="collapse-item" href="makepayment.php">Make Payment</a>
        <a class="collapse-item" href="Viewpayment.php">View Payment</a>
      </div>
    </div>
  </li>



  <!-- Nav Item - Pages Collapse Menu -->
  <!-- <li class="nav-item"> -->
  <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages"> -->
  <!-- <i class="fas fa-fw fa-file"></i> -->
  <!-- <span>Complaints</span> -->
  <!-- </a> -->
  <!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar"> -->
  <!-- <div class="bg-white py-2 collapse-inner rounded"> -->
  <!-- <h6 class="collapse-header">Login Screens:</h6> -->
  <!-- <a class="collapse-item" href="login.php">Un Solved</a> -->
  <!-- <a class="collapse-item" href="register.php">In progress</a> -->
  <!-- <a class="collapse-item" href="forgot-password.php">Resloved</a>
      <a class="collapse-item" href="forgot-password.php">Total Complaints</a>
    </div>
  </div>
</li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button> -->

      <!-- Topbar Search -->
      <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-success" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form> -->


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a> -->
        <!-- Dropdown - Messages -->
        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-success" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li> -->

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter"></span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header bg-dark">
              Notification
            </h6>

            <?php

$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

$id = $_SESSION["mid"];

$sql = "SELECT * FROM notification1 where MEMBER_M_ID='$id' order by N_ID desc limit 3";
$chk = mysqli_query($con, $sql);

if (mysqli_num_rows($chk) > 0) {
  while ($row = mysqli_fetch_assoc($chk)) {
?>

            <a class="dropdown-item d-flex align-items-center" href="message_box.php">
              <div class="mr-3">
                <div class="icon-circle bg-dark">
                  <i class="fas fa-bell text-white"></i>
                </div>
              </div>

             


                  <div>
                    <?php
                    $date = $row['N_DATE'];
                    $dateformate = date_format(new DateTime($date), "d-m-Y");

                    ?>
                    <div class="small text-dark-500"><?php echo $dateformate; ?></div>
                    <span class="font-weight-bold"><?php echo $row['N_DESC']; ?></span>

                  </div>
              
            </a>
            <?php
                }
              }
              ?>
          </div>
        </li>





        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter"></span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header bg-dark">
              Message
            </h6>

            <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
            $sql = "SELECT * FROM notice order by NOTICE_ID DESC limit 5";
            $chk = mysqli_query($con, $sql);

            if (mysqli_num_rows($chk) > 0) {
              while ($row = mysqli_fetch_assoc($chk)) {

            ?>

                <a class="dropdown-item d-flex align-items-center" href="noticeboard.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-dark">
                      <i class="fas fa-envelope text-white"></i>
                    </div>
                  </div>




                  <div class="font-weight-bold">
                    <div class="text-truncate">

                      <?php
                      echo $row['NOTICE_SUBJECT'] . "<br>";

                      ?>
                    </div>



                    <div class="text-dark font-weight-normal">
                      <div class="text-truncate">

                        <?php

                        echo $row['NOTICE_DESCRIPTION'];
                        ?>
                      </div>
                    </div>


                    <?php
                    $date = $row['NOTICE_DATE'];
                    $dateformate = date_format(new DateTime($date), "d-M-Y");

                    ?>
                    <div class="small text-dark-500"><?php echo $dateformate; ?></div>
                  </div>

                </a>
            <?php }
            }
            ?>

          </div>

        </li>



        <div class="topbar-divider d-none d-sm-block"></div>



        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">

              <?php echo $_SESSION["musername"]; ?>

            </span>
            <?php

            echo '<img class="img-profile rounded-circle" src="img/pp.jpg">';

            ?>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="manageprofile.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Manage Profile
            </a>
            <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
            <a class="dropdown-item" href="change-password.php">
              <!-- <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> -->
              <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
              Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure to leave ?</div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>

            <form action="logout.php" method="POST">

              <button type="submit" name="logout_btn" class="btn btn-success">Logout</button>

            </form>


          </div>
        </div>
      </div>
    </div>