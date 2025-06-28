<?php
include '../db/dbconnect.php';
session_start();
include 'assets/include/admin_header.php';
?>



<div class="col-sm-9 col-xs-12 content pt-3 pl-0">


    <div class="row ">
        <div class="col-lg-5">

            <h5 class="mb-0"><strong>Order</strong></h5>
            <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> View Order</span>
        </div>
        <div class="col-md-auto col-lg-7">

            <!-- Message section -->
            <?php
            //Alert OR Error Message:
            if (isset($_SESSION['status'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> ' . $_SESSION['status'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['status']);
            } elseif (isset($_SESSION['statusfail'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> ' . $_SESSION['statusfail'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['statusfail']);
            }
            ?>


        </div>
    </div>


    <div class="row mt-3">
        <div class="col-sm-12">
            <!--Datatable-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Order Id.</th>
                                <th>Customer</th>
                                <th>Category</th>
                                <th>Service</th>
                                <th>Service Provider</th>
                                <th>Amount</th>
                                <!-- <th>Service Provider</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query1 = "SELECT * FROM  `order_master`";
                            $result1 = mysqli_query($conn, $query1);
                            if ($result1) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $order_id = $row1['order_id'];
                                    $customer_id = $row1['customer_id'];
                                    $full_name = $row1['full_name'];
                                    $phone = $row1['phone'];
                                    $order_date = $row1['order_date'];
                                    $due_date = $row1['due_date'];


                            ?>
                                    <tr>
                                        <td class="align-middle"><?php echo $customer_id ?></td>
                                        <td class="align-middle"><?php echo $order_id ?></td>
                                        <td class="align-middle"><?php echo $full_name?></td>
                                        <td class="align-middle"><?php echo $phone ?></td>
                                        <td class="align-middle"><?php echo $order_date ?></td>
                                        <td class="align-middle"><?php echo $due_date ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "order master table not fatched";
                            }


                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sno.</th>
                                <th>Services</th>
                                <th>Category</th>
                                <th>Service Availibility</th>
                                <!-- <th>Service Provider</th> -->
                                <th>Operation</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>




            <!-- try-start-jsgrid BASIC SCENARIO-->
            <!-- <div class="row mt-3">
                <div class="col-sm-12">
    
                    <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
                        <h6 class="mb-2">Basic Scenario</h6>

                        <div id="jsGrid"></div>
                    </div>
                 

                </div>
            </div> -->
            <!-- try-end-jsgrid BASIC SCENARIO -->

        </div>
    </div>






    <!-- Page JavaScript Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="assets/js/progressbar.min.js"></script>
    <!--Charts-->
    <!--Canvas JS-->
    <script src="assets/js/charts/canvas.min.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->
    <!--Datatable-->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <!--JsGrid table-->
    <script src="assets/js/jsgrid.min.js"></script>
    <script src="assets/js/jsgrid-demo.php"></script>

    <!--Custom Js Script-->
    <script src="assets/js/custom.js"></script>
    <!--Custom Js Script-->

    <script>
        $('#example').DataTable();
    </script>
    <?php
    include 'assets/include/admin_footer.php';
    ?>