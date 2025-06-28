<?php
include '../db/dbconnect.php';
// session_start();
include 'assets/include/admin_header.php';
?>



<div class="col-sm-9 col-xs-12 content pt-3 pl-0">


    <div class="row ">
        <div class="col-lg-5">

            <h5 class="mb-0"><strong>Generate Report</strong></h5>
            <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Generate report</span>
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
            <!--Dashboard widget-->
            <div class="mt-1 mb-3 button-container">
                <div class="row pl-0">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                        <div class="bg-white border shadow">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <form action="../php/customer_report.php" method="post">
                                        <h5 class="mt-0 mb-0"><strong>Customer Report<br> [City wise]</strong></h5>

                                        <label for="selectcity" class="control-label">Select city:</label>
                                        <select class="form-control" id="selectcity" name="selectcity" required>
                                            <option value="">select city</option>
                                            <?php
                                            //city fetch
                                            $sql = "SELECT * FROM `city`";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $city_name = $row['city_name'];
                                                    echo '
                                                    <option value="' . $city_name . '">' . $city_name . '</option>
                                                    ';
                                                }
                                            } else {
                                                echo 'note inserted';
                                            }
                                            ?>
                                        </select>

                                        <button type="submit" name="customer_report_city_wise" class="btn btn-sm btn-theme mt-4"> <i class="fa fa-download mr-3"></i> Download Report</button>
                                    </form>
                                    <!-- <p><small class="text-muted bc-description">Total Revenue</small></p> -->
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                        <div class="bg-white border shadow">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-warning">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <form action="../php/sp_report_city_wise.php" method="post">
                                        <h5 class="mt-0 mb-0"><strong>Service Provider Report [City wise]</strong></h5>

                                        <label for="selectcity" class="control-label">Select city:</label>
                                        <select class="form-control" id="selectcity" name="selectcity" required>
                                            <option value="">select city</option>
                                            <?php
                                            //city fetch
                                            $sql = "SELECT * FROM `city`";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $city_name = $row['city_name'];
                                                    echo '
                                                    <option value="' . $city_name . '">' . $city_name . '</option>
                                                    ';
                                                }
                                            } else {
                                                echo 'note inserted';
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" name="sp_report_city_wise" class="btn btn-sm btn-theme mt-4"> <i class="fa fa-download mr-3"></i> Download Report</button>
                                    </form>
                                    <!-- <p><small class="text-muted bc-description">Customers</small></p> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                        <div class="bg-white border shadow">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <form action="../php/sp_report_category_wise.php" method="post">
                                        <h5 class="mt-0 mb-0"><strong>Service Provider Report [Category wise]</strong></h5>

                                        <label for="selectcategory" class="control-label">Select category:</label>
                                        <select class="form-control" id="selectcategory" name="selectcategory" required>
                                            <option value="">select category</option>
                                            <?php
                                            // category get from CATEGORY table
                                            $sql2 = "SELECT * FROM `category`";
                                            $result2 = mysqli_query($conn, $sql2);
                                            if ($result2) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    $category_name = $row2['category_name'];
                                                    echo '
                                                    <option value="' . $category_name . '">' . $category_name . '</option>
                                                    ';
                                                }
                                            } else {
                                                echo 'note inserted';
                                            }
                                            ?>
                                        </select>

                                        <button type="submit" name="sp_report_category_wise" class="btn btn-sm btn-theme mt-4"> <i class="fa fa-download mr-3"></i> Download Report</button>
                                    </form>
                                    <!-- <p><small class="text-muted bc-description">Total Products</small></p> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                        <div class="bg-white border shadow">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <form action="../php/repeat_customer_report.php" method="post">
                                        <h5 class="mt-0 mb-0"><strong>Repeat customer Report</strong></h5>
                                        <button type="submit" name="repeat_customer_report" class="btn btn-sm btn-theme mt-4"> <i class="fa fa-download mr-3"></i> Download Report</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- 
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                        <div class="bg-white border shadow">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <form action="../php/review_rating_report.php" method="post">
                                        <h5 class="mt-0 mb-0"><strong>Review & Rating Report</strong></h5>
                                        <button type="submit" name="category_wise_report" class="btn btn-sm btn-theme mt-4">Download Report</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->


                </div>
            </div>
            <!--/Dashboard widget-->
            <!-- start here -->







        </div>
    </div>






    <?php
    include 'assets/include/admin_footer.php';
    ?>