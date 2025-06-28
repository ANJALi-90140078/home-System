<?php
include '../db/dbconnect.php';
// session_start();
include 'assets/include/admin_header.php';
?>



<div class="col-sm-9 col-xs-12 content pt-3 pl-0">


    <div class="row ">
        <div class="col-lg-5">

            <h5 class="mb-0"><strong>Service Provider</strong></h5>
            <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> View Service Provider Details</span>
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


    <?php

    ?>


    <div class="row mt-3">
        <div class="col-sm-12">
            <!--Datatable-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Pincode</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php // SERVICE PROVIDER VIEW CODE. Data get from SP & CITY table using inner joinn becase we need "city name" from city table.
                            $sql = "SELECT `sp`.* , `city`.*
                            FROM `sp` INNER JOIN `city` 
                            ON `sp`.city_id=`city`.city_id";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $sno = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sno = $sno + 1;
                                    $login_id = $row['login_id'];
                                    $sp_id = $row['sp_id'];
                                    $sp_name = $row['sp_name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $city = $row['city_name'];
                                    $pincode = $row['pincode'];
                                    $status = $row['status'];

                            ?>
                                    <tr>
                                        <td><?php echo $sno ?></td>
                                        <td><?php echo $sp_name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $city ?></td>
                                        <td><?php echo $pincode ?></td>
                                        <td>
                                            <?php
                                            if ($status == 'deactive') {
                                                echo '<span class="badge badge-warning">Deactive</span>';
                                            }
                                            if ($status == 'active') {
                                                echo '<span class="badge badge-success">Active</span>';
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            if ($status == 'deactive') {
                                               ?>
                                               <a href="approve.php?spid=<?php echo $sp_id ?>&status=<?php echo $status ?>" title="Activate service provider"> <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button></a>
                                               <?php
                                            }
                                            if ($status == 'active') {
                                                ?>
                                                <a href="approve.php?spid=<?php echo $sp_id ?>&status=<?php echo $status ?>" title="Deactivate service provider"> <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button></a>
                                                <?php
                                            }
                                            ?>
                                            <!-- <a href="sp_details.php"><button type="submit" class="btn btn-sm btn-theme">See details</button></a> -->
                                            <a href="sp_delete.php?spid=<?php echo $sp_id ?>&loginid=<?php echo $login_id ?>"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>
                                            <a href="sp_gig_view.php?spid=<?php echo $sp_id ?>&spname=<?php echo $sp_name ?>" title="Go to Service gig" ><button type="submit" class="btn btn-sm btn-theme"><i class="fas fa-eye"></i></button></a>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sno.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Pincode</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!--/Datatable-->


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