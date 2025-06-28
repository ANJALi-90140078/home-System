<?php
include '../db/dbconnect.php';
$title = 'Make Service Gig';
include 'assets/include/sp_header.php';
?>

<?php
include '../db/dbconnect.php';
//Make gig in spservice table
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $servicetitle = $_POST['servicetitle'];
    $sp_login_id = $_SESSION['sp_login_id'];
    $category_id = $_POST['category'];
    $service_id = $_POST['service'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $service_availibility = $_POST['service_availibility'];

    // fetch service provicer id from SP table throught login id 
    $fetchspid = "SELECT * FROM `sp` WHERE login_id = $sp_login_id";
    $fetchresult = mysqli_query($conn, $fetchspid);
    $numexist = mysqli_num_rows($fetchresult);
    if ($numexist > 0 && $numexist < 2) {
        $row = mysqli_fetch_assoc($fetchresult);
        $sp_id =  $row['sp_id'];
    }

    // $categorysql = "SELECT * FROM `service`"


    $check = "SELECT * FROM `sp_service` WHERE sp_id = $sp_id AND service_id = $service_id";
    $checkresult = mysqli_query($conn, $check);
    $numexist2 = mysqli_num_rows($checkresult);
    if ($numexist2 > 0) {
        $showError = "Sorry, Already you have same service gig.";
    } else {
        $row = mysqli_fetch_assoc($checkresult);
        $input = "INSERT INTO `sp_service` (`sp_id`, `service_id`,`category_id`, `service_title`, `price`, `description`, `availability`) VALUES ('$sp_id', '$service_id','$category_id', '$servicetitle', '$price' ,'$description', '$service_availibility')";
        // $input = "INSERT INTO `sp_service` (`sp_id`, `service_id`, `service_title`, `price`, `description`, `availability`) VALUES ('47', '18', 'Best Hair cut ', '300', 'I cut customize hair with style', '1')";
        $inputresult = mysqli_query($conn, $input);
        //ALERT OR ERROR!
        if ($inputresult) {
            $showAlert = "Your Gig Successfully Created.";
        } else {
            $showError = "Sorry, Your Gig is not Created.";
        }
    }
}
?>


<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <div class="row ">
        <div class="col-lg-5">
            <h5 class="mb-0"><strong>Make Service</strong></h5>
            <span class="text-secondary">Workspace<i class="fa fa-angle-right"></i> make Service</span>
        </div>
        <div class="col-md-auto col-lg-7">

            <!-- Message section -->
            <?php
            //Alert OR Error Message:
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
                    <strong>Oops! </strong> ' . $showError . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }
            ?>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-sm-12">
            <!-- create service -->
            <!--Hoverable Table-->
            <div class="mt-3 mb-3 p-1 button-container  bg-white shadow-sm border">
                <!-- <h6>Hoverable table</h6> -->
                <!--Vertical forms-->
                <div class="col-sm-12 ">
                    <h6 class="mb-2 pt-3 font-weight-bold">Make Service gig</h6>
                    <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm ">

                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <!-- choose category for update -->
                            <div class="form-group row">
                                <label for="categoryname" class="control-label col-sm-3">Service title:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="servicetitle" name="servicetitle" placeholder="ex.kitchen cleaning" />
                                    <small id="" class="form-text text-muted">Give suitable service title according your work.</small>
                                </div>
                            </div>
                        

                            <div class="form-group row pt-3">
                                <label for="categoryname" class="control-label col-sm-3">Select Category:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="category" name="category" required>
                                        <option selected disabled>select category</option>
                                        <?php 
                                        // category view code. Data get from category table
                                        $categorysql = "SELECT * FROM `category`";
                                        $result = mysqli_query($conn, $categorysql);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $category_id = $row['category_id'];
                                                $category_name = $row['category_name'];
                                                echo '<option value="' . $category_id . '">' . $category_name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <small id="" class="form-text text-muted">Select a category under which you would like to add a service.</small>
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <label for="servicename" class="control-label col-sm-3">Select Service:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="service" name="service">
                                        <option selected disabled>select service</option>
                                        <!-- <option>124</option>   
                                        <option>57</option>    -->
                                    </select>
                                    <small id="" class="form-text text-muted">Select a category under which you would like to add a service.</small>
                                </div>
                            </div>

                            <!-- enter category name -->
                            <div class="form-group row pt-3">
                                <label class="control-label col-sm-3" for="updatedcategory">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description" placeholder="ex.I Provide this & that service that way" rows="3"></textarea>
                                    <small id="service" class="form-text text-muted">Enter short Service description:</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categoryname" class="control-label col-sm-3">Price:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="₹500" />
                                    <small id="" class="form-text text-muted">Please Charge service as a market price.</small>
                                </div>
                            </div>

                            <!-- enter service availability -->
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

                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Create</button>
                                    <button type="reset" class="btn btn-outline-secondary"> Cancel</button>
                                </div>
                                <div class="">
                                    <!-- <a href="service_view.php" class="btn btn-outline-primary">View all Serivces</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/Vertical form-->
            </div>
            <!--/Hoverable Table-->


        </div>
    </div>


    <script>
        $('#category').on('change', function() {
            var category_id = this.value;
            // console.log(category);
            $.ajax({
                url: 'assets/ajax/_category_ajax.php',
                type: "POST",
                data: {
                    // you can give you any name because this variable goes into ajax file
                    // category_anything: category_id
                    category_id: category_id
                },
                success: function(result) {
                    $('#service').html(result);
                    // console.log(result);
                }
            })
        })
    </script>



    <?php
    include 'assets/include/sp_footer.php';
    ?>