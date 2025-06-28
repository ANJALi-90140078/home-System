<?php
include '../db/dbconnect.php';
// session_start();
include 'assets/include/admin_header.php';
?>

<?php
$showAlert = false;
$showError = false;

//insert service
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_name = $_POST['servicename'];
    $category_name = $_POST['categoryname'];
    $service_availibility = $_POST['service_availibility'];
    $fetch_categoryid = "SELECT `category_id` FROM `category` where category_name ='$category_name'";
    $fetch_category_result = mysqli_query($conn, $fetch_categoryid);
    $category_row = mysqli_fetch_assoc($fetch_category_result);
    $category_id = $category_row['category_id'];

    // check whether service exist or not
    $existsql = "SELECT * FROM `service` where service_name ='$service_name' ";
    $existresult = mysqli_query($conn, $existsql);

    $numexist = mysqli_num_rows($existresult);
    if ($numexist > 0) {
        // $_SESSION['statusfail'] = "Service is already existing.";
        // header("location: service_add.php");
        $showError = "Service is already existing";
    } else {
        //INSERT service QUERY
        $input = "INSERT INTO `service` (`service_id`,`category_id`, `service_name`, `service_availibility`) VALUES ('', '$category_id','$service_name','$service_availibility`')";
        $inputresult = mysqli_query($conn, $input);

        //ALERT OR ERROR!
        if ($inputresult) {
            // $_SESSION['status'] = "Service Added Successfully.";
            // header("location: service_add.php");
            $showAlert = "Service Added Successfully.";
        } else {
            // $_SESSION['statusfail'] = "Service not Added";
            // header("location: service_add.php");
            $showError = "Service not added! Something went wrong";
        }
    }
}
?>


<div class="col-sm-9 col-xs-12 content pt-3 pl-0">


    <div class="row ">
        <div class="col-lg-5">

            <h5 class="mb-0"><strong>Services</strong></h5>
            <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Add Services</span>
        </div>
        <div class="col-md-auto col-lg-7">

            <!-- Message section -->
            <?php
            if ($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> ' . $showAlert . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }
            if ($showError) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry! </strong> ' . $showError . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }


            //Alert OR Error Message using SESSION:
            // if (isset($_SESSION['status'])) {
            //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //             <strong>Success! </strong> ' . $_SESSION['status'] . '
            //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //             <span aria-hidden="true">&times;</span>
            //             </button>
            //             </div>';
            //     unset($_SESSION['status']);
            // } elseif (isset($_SESSION['statusfail'])) {
            //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            //             <strong>Success! </strong> ' . $_SESSION['statusfail'] . '
            //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //             <span aria-hidden="true">&times;</span>
            //             </button>
            //             </div>';
            //     unset($_SESSION['statusfail']);
            // }
            ?>


        </div>
    </div>


    <div class="row mt-3">
        <div class="col-sm-12">






            <!-- add service -->
            <!--Hoverable Table-->
            <div class="mt-3 mb-3 p-1 button-container  bg-white shadow-sm border">
                <!-- <h6>Hoverable table</h6> -->
                <!--Vertical forms-->
                <div class="col-sm-12 ">
                    <h6 class="mb-2 pt-3 font-weight-bold">Add Services</h6>
                    <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm ">

                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <!-- choose category for update -->
                            <div class="form-group row">
                                <label for="categoryname" class="control-label col-sm-3">Select Category:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="categoryname" name="categoryname" required>
                                        <option value="">select category</option>
                                        <?php
                                        // category get from CATEGORY table
                                        $sql = "SELECT * FROM `category`";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $category_name = $row['category_name'];
                                                echo '
                                                    <option value="' . $category_name . '">' . $category_name . '</option>
                                                    ';
                                            }
                                        } else {
                                            echo 'note inserted';
                                        }
                                        ?>
                                    </select>
                                    <small id="" class="form-text text-muted">Select a category under which you would like to add a service.</small>
                                </div>
                            </div>

                            <!-- enter category name -->
                            <div class="form-group row pt-3">
                                <label class="control-label col-sm-3" for="updatedcategory">Add Service name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="servicename" name="servicename" placeholder="ex.Repairing" required>
                                    <small id="service" class="form-text text-muted">Enter Service name:</small>
                                </div>
                            </div>
                            <!-- enter category name -->
                            <div class="form-group row pt-3">
                                <label class="control-label col-sm-3" for="updatedcategory">Service Availibility:</label>
                                <div class="col-sm-9">
                                    <!-- male female start -->
                                    <div class="custom-control custom-radio mb-0">
                                        <input type="radio" class="custom-control-input " id="customControlValidation2" value="1" name="service_availibility" required>
                                        <label class="custom-control-label" for="customControlValidation2">Yes</label>
                                    </div>

                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input " id="customControlValidation3" value="0" name="service_availibility" required>
                                        <label class="custom-control-label" for="customControlValidation3">No</label>
                                        <div class="invalid-feedback">More example invalid feedback text</div>
                                    </div>
                                    <!-- male female end -->

                                </div>
                            </div>

                            <div class="form-group pt-3 col-sm-12 d-flex justify-content-between">
                                <div class="">

                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add</button>
                                    <button type="reset" class="btn btn-outline-secondary"> Cancel</button>
                                </div>
                                <div class="">
                                    <!-- <a href="" class="btn btn-outline-primary">Update service</a> -->
                                    <a href="service_view.php" class="btn btn-outline-primary">View all Serivces</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/Vertical form-->
            </div>
            <!--/Hoverable Table--> 







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