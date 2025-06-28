<?php
define('MYSITE', true);
include '../db/dbconnect.php';

$title = 'Main';
$css_directory = '../css/main.min.css';
$css_directory2 = '../css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<style>
    .card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
        background-color: #0A2647;
        color: white;
    }

    .showcategoryimg {
        background-image: url('../img/services/service_14.jpg');
        object-fit: cover;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.5;
    }

    /* for sticky footer */
    .sticky {
        position: fixed;
        bottom: 0;
        left: 860px;
        bottom: 10px;
        width: 100%;
        z-index: 1;
    }
</style>

<body>
    <?php
    //fetch category name from index.php
    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $sql = "SELECT * FROM `category` WHERE category_id = $category_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
            }
        }
    } else {
        // if anyone directly enter url then else part run
        echo "<script>
        window.location.href='customer_index.php';
        </script>";
    }
    ?>

    <!-- ===landing page image Start=== -->
    <div class="jumbotron jumbotron-fluid bg-c1-4 mb-0">
        <div class="container">
            <h1 class="display-4"><b><?php echo $category_name ?></b></h1>
            <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
        </div>
    </div>
    <div class="bg-white sticky-top">
        <div class="container mb-3 py-4">


            <?php
            //fetch service name
            $sql = "SELECT * FROM `service` WHERE category_id = $category_id";
            $result = mysqli_query($conn, $sql);
            $numexist = mysqli_num_rows($result);
            if ($numexist > 0) {
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $service_id = $row['service_id'];
                        $service_name = $row['service_name'];
                        // <a href="serviceshow.php?service_id=' . $service_id . '&service_name=' . $service_name . '"><button type="button" class="btn btn-outline-c1-1">' . $service_name . '</button></a>
            ?>
                        <a href="serviceshow.php?serviceid=<?php echo $service_id ?>"><button type="button" class="btn btn-outline-c1-1"><?php echo $service_name ?></button></a>
            <?php
                    }
                }
            } else {
                echo '
            <div class="alert alert-danger" role="alert">
                No any Services under ' . $category_name . '
            </div>
            
            ';
            }
            ?>

        </div>
    </div>

    <!-- ===landing page image End=== -->



    <!-- ===Service provider gig show page image Start=== -->
    <div class="container">
    
        <div class="row">
            <!-- ===Left side main page Start=== -->
            <div class="col-sm-7">
                <div class="">
                    <?php
                    //fetch service name    
                    $price = false;
                    $fetchspgig = "SELECT * FROM `sp_service` where `category_id` = $category_id";
                    $gigresult = mysqli_query($conn, $fetchspgig);
                    while ($gigrow = mysqli_fetch_assoc($gigresult)) {
                        $service_title = $gigrow['service_title'];
                        $category_id = $gigrow['category_id'];
                        $sp_id = $gigrow['sp_id'];
                        $price = $gigrow['price'];
                        $description = $gigrow['description'];
                        if ($gigrow['availability'] == 1) {
                            $availibility = "Yes";
                        } else {
                            $availibility = "No";
                        }

                        $spname = "SELECT * FROM `sp` WHERE sp_id = $sp_id";
                        $spname_result = mysqli_query($conn, $spname);
                        while ($sprow = mysqli_fetch_assoc($spname_result)) {
                            $sp_name = $sprow['sp_name'];
                        }
                        $service_id = $gigrow['service_id'];
                        $servicename = "SELECT * FROM `service` WHERE service_id = $service_id";
                        $servicename_result = mysqli_query($conn, $servicename);
                        while ($servicerow = mysqli_fetch_assoc($servicename_result)) {
                            $service_name = $servicerow['service_name'];
                        }

                    ?>

                        <!-- main card start -->
                        <form action="manage_cart.php" method="post">
                            <div class="media m-4">
                                <div class="media-body col-7">

                                    <span class="text-success" style="text-transform:uppercase;"><?php echo $service_name ?></span>
                                    <hr style="margin:2px;">
                                    <h5 class="mt-0"><?php
                                                        echo $service_title;
                                                        ?></h5>
                                    <h6>Service provider: <?php echo $sp_name; ?></h6>
                                    <h6 class="badge badge-success">4.4 <i class="fa-solid fa-star"></i></h6>
                                    <h6>Starts at <small>&#8377;</small><?php echo $price ?>/-</h6>
                                    <hr style="margin-bottom: 5px;">
                                    <p><?php echo $description ?></p>
                                    <!-- <a href="" data-toggle="modal" data-target="#exampleModal"><b>View details</b> </a> -->

                                    <!--comment out start Modal -->
                                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $service_name ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Add details here </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                    <!--comment out enc modal end -->


                                    <!-- <div class="media mt-3">
                                <a class="mr-3" href="#">
                                    <img src="..." alt="...">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5>
                                    <p>Greetings loved ones lets take a journey. Yes, we make angels cry, raining down on earth from up above. Give you something good to celebrate. I used to bite my tongue and hold my breath. Im ma get your heart racing in my skin-tight jeans. As I march alone to a different beat. Summer after high school when we first met. Youre so hypnotizing, could you be the devil? Could you be an angel? It time to bring out the big balloons. Thought that I was the exception Bikinis, zucchinis, Martinis, no weenies</p>
                                </div>
                            </div> -->
                                </div>
                                <!-- <center>
                                <div class="">
                                    <img src="img/plumber.jpg" style="width:100px; height:100px; object-fit:cover;" class="mr-3" alt="..."><br>
                                    <a href="" class="btn btn-c1-1">Add to Cart</a>
                                </div>
                            </center> -->

                                <div class=" ml-5 text-center" style="width:10rem;">
                                    <img src="../img/<?php echo $category_id ?>.jpg" style="width:100px; height:100px;object-fit:cover; border-radius:10px" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <button type="submit" name="add_to_cart" class="card-link btn btn-c1-1" style="border-radius:10px;">Add to Cart</button>
                                        <!-- category id pn moklvi pdi because jo category id bahar thi set thy ne nai aave to error batavse dynamic page che atle. -->
                                        <input type="hidden" name="category_id" value="<?php echo $category_id ?>">
                                        <input type="hidden" name="service_id" value="<?php echo $service_id ?>">
                                        <input type="hidden" name="service_name" value="<?php echo $service_name ?>">
                                        <input type="hidden" name="service_title" value="<?php echo $service_title ?>">
                                        <input type="hidden" name="price" value="<?php echo $price ?>">
                                        <input type="hidden" name="sp_name" value="<?php echo $sp_name; ?>">
                                        <input type="hidden" name="sp_id" value="<?php echo $sp_id; ?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <!-- main card end -->

                    <?php
                        //end while loop
                    }
                    ?>

                </div>
            </div>
            <!-- ===Left side main page End=== -->


            <!-- ===Right side main page Start=== -->
            <div class="col-sm-4 sticky">
                <div class="">

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
                        <strong>Oops! </strong> ' . $_SESSION['statusfail'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['statusfail']);
            }
            ?>



                    <div class="row justify-content-around " style="bottom:0; align-items:center;">
                        <!-- <a href="" class="card-link btn btn-c1-1" style="border-radius:10px;">Add to Cart</a> -->
                        <!-- <h3 class="" id="grandtotal">&#8377;/-</h2> -->
                            <a href="mycart.php" class="card-link btn btn-c1-2 px-5 py-3 "><b>View Cart</b></a>
                    </div>

                </div>
            </div>
            <!-- ===Right side main page End=== -->
        </div>
    </div>
    <!-- ===Service provider gig show page image End=== -->





    <script>
        var grandtotal = document.getElementById('grandtotal');
        var myVariable = localStorage.getItem("myVar");
        console.log(myVariable);
        grandtotal.innerText = myVariable;
    </script>






    <?php
    include '../includes/footer.php';
    // include 'includes/navfooter.php';
    ?>