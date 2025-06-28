<?php
include '../db/dbconnect.php';
include 'assets/include/sp_header.php';
?>



<div class="col-sm-9 col-xs-12 content pt-3 pl-0">

    <h5 class="mb-0"><strong>Service Provider</strong></h5>
    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> View Service Provider Details</span>
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
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php // SERVICE PROVIDER VIEW CODE. Data get from SP & CITY table using inner joinn becase we need "city name" from city table.
                            $sql = "SELECT sp.* , city.*
                            FROM sp INNER JOIN city 
                            ON sp.city_id=city.city_id";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $sno = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sno = $sno + 1;
                                    $sp_id = $row['sp_id'];
                                    $sp_name = $row['sp_name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $city = $row['city_name'];
                                    $pincode = $row['pincode'];

                                    echo '<tr>
                                                <td>' . $sno . '</td>
                                                <td>' . $sp_name . '</td>
                                                <td>' . $email . '</td>
                                                <td>' . $phone . '</td>
                                                <td>' . $city . '</td>
                                                <td>' . $pincode . '</td>
                                                <td>
                                                
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Edit
                </button>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-secondary" id="exampleModalCenterTitle"><strong>Modal title</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- modalbody start -->
                                <form class="needs-validation" action="'?><?php echo $_SERVER['PHP_SELF'] ?><?echo '" method="post" novalidate>
                                    <!-- name & email line -->
                                    <div class="form-row">
                                        <div class="form-group col-md-12 input-group-sm">
                                            <label for="spname">Name</label>
                                            <input type="text" class="form-control" id="sp_name" name="sp_name" required>
                                            <!-- <div class="valid-feedback">Looks good!</div> -->
                                        </div>
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailFeedback" required>
                                            <div id="emailFeedback" class="invalid-feedback">
                                                Please provide a valid email.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="phone">Phone No.</label>
                                            <!-- <input type="tel" class="form-control" required pattern="^[0-9-+\s()]{10,16}" data-for="phoneNumber"> -->
                                            <input type="tel" class="form-control" pattern="\d{10}" data-for="phoneNumber" name="phone" aria-describedby="phoneFeedback" required>
                                            <div id="phoneFeedback" class="invalid-feedback">
                                                Please provide a valid Phone number.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- city line -->
                                    <div class="form-row">
                                        <div class="form-group col-md-4 input-group-sm">
                                            <label for="city">City</label>                                        
                                            <select id="sp_city" class=" custom-select" name="sp_city" required>
                                                <option value="">Choose City</option>
                                                ' ?><?php //fetch city in MODAL
                                                    $sql2 = "SELECT * FROM `city`";
                                                    $result2 = mysqli_query($conn,$sql2);
                                                    if ($result2) {
                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                            $city_name= $row2['city_name'];
                                                            echo '<option value="'.$city_name.'">'.$city_name.'</option>';
                                                        }
                                                    }
                                                    
                                                    
                                                    ?><?php echo '
                                            
                                        

                                            </select>
                                            <div class="invalid-feedback">Please choose a city.</div>
                                        </div>
                                        <div class="form-group col-md-2 input-group-sm">
                                            <label for="Pincode">Pincode</label>
                                            <input type="text" class="form-control" pattern="\d{6}" name="pincode" id="pincode" required>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-4">
                                    <!-- usename line -->
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-6">
                                            <label for="inlineFormInputGroupUsername2">Create Username</label>
                                            <div class="input-group mb-2 mr-sm-2 input-group-sm">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-c1-1 text-light">@</div>
                                                </div>
                                                <input type="text" class="form-control" pattern="(?=.*[a-z]).{4,}" id="username" name="username" placeholder="sahil_18" aria-describedby="inputGroupPrepend" required>

                                                <div class="invalid-feedback">
                                                    Please choose a right username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- password line -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="password">Create Password</label>
                                            <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <div id="phoneFeedback" class="invalid-feedback">
                                                Must contain at least one number and one uppercase and lowercase letter, and at least 8 or
                                                more characters.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="confirmpassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="cpassword" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <div id="phoneFeedback" class="invalid-feedback">
                                                Password does not matched.
                                            </div>
                                        </div>
                                    </div>

                                    <a href=""><button type="submit" class="btn btn-c1-1">Sign in</button></a>
                                    <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                                </form>
                                <!-- modalbody end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                 
                                                
                                                
                <button type="button" class="btn btn-danger">Remove</button>
                
                </td>';
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!--/Datatable-->

            <!--Modals position-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">

                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                    Vertically centered
                </button>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-secondary" id="exampleModalCenterTitle"><strong>Modal title</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- modalbody start -->
                                <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" novalidate>
                                    <!-- name & email line -->
                                    <div class="form-row">
                                        <div class="form-group col-md-12 input-group-sm">
                                            <label for="spname">Name</label>
                                            <input type="text" class="form-control" id="sp_name" name="sp_name" required>
                                            <!-- <div class="valid-feedback">Looks good!</div> -->
                                        </div>
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailFeedback" required>
                                            <div id="emailFeedback" class="invalid-feedback">
                                                Please provide a valid email.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="phone">Phone No.</label>
                                            <!-- <input type="tel" class="form-control" required pattern="^[0-9-+\s()]{10,16}" data-for="phoneNumber"> -->
                                            <input type="tel" class="form-control" pattern="\d{10}" data-for="phoneNumber" name="phone" aria-describedby="phoneFeedback" required>
                                            <div id="phoneFeedback" class="invalid-feedback">
                                                Please provide a valid Phone number.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- city line -->
                                    <div class="form-row">
                                        <div class="form-group col-md-4 input-group-sm">
                                            <label for="city">City</label>
                                            <select id="sp_city" class=" custom-select" name="sp_city" required>
                                                <option value="">Choose City</option>
                                                <?php // category view code. Data get from category table
                                                $sql = "SELECT * FROM `city`";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $city_name = $row['city_name'];
                                                        echo '<option value="' . $city_name . '">' . $city_name . '</option>';
                                                    }
                                                }
                                                ?>
                                                <!-- <option value="two">.this..</option>
                                                    <option value="three">.and..</option>
                                                    <option value="five">.that..</option> -->
                                            </select>
                                            <div class="invalid-feedback">Please choose a city.</div>
                                        </div>
                                        <div class="form-group col-md-2 input-group-sm">
                                            <label for="Pincode">Pincode</label>
                                            <input type="text" class="form-control" pattern="\d{6}" name="pincode" id="pincode" required>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-4">
                                    <!-- usename line -->
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-6">
                                            <label for="inlineFormInputGroupUsername2">Create Username</label>
                                            <div class="input-group mb-2 mr-sm-2 input-group-sm">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-c1-1 text-light">@</div>
                                                </div>
                                                <input type="text" class="form-control" pattern="(?=.*[a-z]).{4,}" id="username" name="username" placeholder="sahil_18" aria-describedby="inputGroupPrepend" required>

                                                <div class="invalid-feedback">
                                                    Please choose a right username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- password line -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="password">Create Password</label>
                                            <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <div id="phoneFeedback" class="invalid-feedback">
                                                Must contain at least one number and one uppercase and lowercase letter, and at least 8 or
                                                more characters.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 input-group-sm">
                                            <label for="confirmpassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="cpassword" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <div id="phoneFeedback" class="invalid-feedback">
                                                Password does not matched.
                                            </div>
                                        </div>
                                    </div>

                                    <a href=""><button type="submit" class="btn btn-c1-1">Sign in</button></a>
                                    <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                                </form>
                                <!-- modalbody end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </div>
            <!--/Modal position-->






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
    include 'assets/include/sp_footer.php';
    ?>