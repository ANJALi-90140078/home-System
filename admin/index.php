<?php
// define('MYSITE', true);
include '../db/dbconnect.php';
include 'assets/include/admin_header.php';
?>


<!--Content right-->
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-3"><strong>Dashboard</strong></h5>

    <!--Dashboard widget-->
    <div class="mt-1 mb-3 button-container">

        <div class="col-lg-12 col-md-4 col-sm-6 col-12 mb-3 pl-0">
            <div class="bg-theme border shadow">
                <a href="sp_view.php">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-white">
                            <i class="fa fa-male text-theme"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3 class="mt-0 mb-0 text-white"><strong>Welcome, <?php echo $_SESSION['admin_username'] ?></strong></h3>
                            <p><small class="text-white bc-description">Admin</small></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row pl-0">

            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="bg-white border shadow">
                    <a href="sp_view.php">
                        <div class="media p-4">
                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                                <i class="fa fa-male"></i>
                            </div>
                            <div class="media-body pl-2">
                                <?php
                                $spquery = "SELECT COUNT(sp_id) AS num_sp FROM sp";
                                $spqueryresult = mysqli_query($conn, $spquery);
                                if ($spqueryresult) {
                                    while ($row = mysqli_fetch_assoc($spqueryresult)) {
                                        $num_sp = $row['num_sp'];
                                    }
                                ?>
                                    <h3 class="mt-0 mb-0"><strong><?php echo $num_sp ?></strong></h3>
                                <?php
                                }
                                ?>
                                <p><small class="text-muted bc-description">Total Service provider</small></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="media-body pl-2">
                            <?php
                            $customerquery = "SELECT COUNT(customer_id) AS num_customer FROM customer";
                            $customerqueryresult = mysqli_query($conn, $customerquery);
                            if ($customerqueryresult) {
                                while ($row = mysqli_fetch_assoc($customerqueryresult)) {
                                    $num_customer = $row['num_customer'];
                                }
                            ?>
                                <h3 class="mt-0 mb-0"><strong><?php echo $num_customer ?></strong></h3>
                            <?php
                            }
                            ?>
                            <p><small class="text-muted bc-description">Total Customer</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="bg-theme border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-white">
                            <i class="fas fa-check-circle text-theme"></i>
                        </div>
                        <div class="media-body pl-2">
                            <?php
                            $orderquery = "SELECT COUNT(order_id) AS num_orders FROM order_master";
                            $orderqueryresult = mysqli_query($conn, $orderquery);
                            if ($orderqueryresult) {
                                while ($row2 = mysqli_fetch_assoc($orderqueryresult)) {
                                    $num_orders = $row2['num_orders'];
                                }
                            }
                            ?>
                            <h3 class="mt-0 mb-0"><strong><?php echo $num_orders ?></strong></h3>
                            <p><small class="text-white bc-description">Total Orders</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                            <i class="fa fa-cogs "></i>
                        </div>
                        <div class="media-body pl-2">
                            <?php
                            $servicegig = "SELECT COUNT(service_title) AS servicegig FROM sp_service";
                            $servicegigresult = mysqli_query($conn, $servicegig);
                            if ($servicegigresult) {
                                while ($servicegigrow = mysqli_fetch_assoc($servicegigresult)) {
                                    $service_gig = $servicegigrow['servicegig'];
                                }
                            }
                            ?>
                            <h3 class="mt-0 mb-0"><strong><?php echo $service_gig ?></strong></h3>
                            <p><small class="bc-description text-muted">Total Service GIG</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="bg-white border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme">
                            <i class="fa fa-group "></i>
                        </div>
                        <div class="media-body pl-2">
                            <?php
                            $repeatcustomer = "SELECT COUNT(*) AS num_repeat_customers
                                FROM (
                                  SELECT customer_id
                                  FROM order_master
                                  GROUP BY customer_id
                                  HAVING COUNT(DISTINCT order_date) > 1
                                ) AS repeat_customers";
                            $repeatcustomerresult = mysqli_query($conn, $repeatcustomer);
                            while ($row3 = mysqli_fetch_assoc($repeatcustomerresult)) {
                                $repeat_customer = $row3['num_repeat_customers'];
                            }

                            ?>
                            <h3 class="mt-0 mb-0"><strong><?php echo $repeat_customer ?></strong></h3>
                            <p><small class="bc-description text-muted">Repeat Customer</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="bg-theme border shadow">
                    <div class="media p-4">
                        <div class="align-self-center mr-3 rounded-circle notify-icon bg-white">
                            <i class="fa fa-tags text-theme"></i>
                        </div>
                        <div class="media-body pl-2">
                            <?php
                            $total = "SELECT SUM(total) AS total_revenue FROM order_master;";
                            $totalresult = mysqli_query($conn, $total);
                            while ($row4 = mysqli_fetch_assoc($totalresult)) {
                                $total = $row4['total_revenue'];
                            }

                            ?>
                            <h3 class="mt-0 mb-0"><strong><?php echo $total ?>/-</strong></h3>
                            <p><small class="bc-description text-white">Total Revenue</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Dashboard widget-->

</div>

<!--Footer-->
<!-- <div class="row mt-5 mb-4 footer">
    <div class="col-sm-8">
        <span>&copy; All rights reserved 2019 designed by <a class="text-theme" href="#">A-Fusion</a></span>
    </div>
    <div class="col-sm-4 text-right">
        <a href="#" class="ml-2">Contact Us</a>
        <a href="#" class="ml-2">Support</a>
    </div>
</div> -->
<!--Footer-->

<?php
include 'assets/include/admin_footer.php';
?>