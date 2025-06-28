<?php
if (!defined('MYSITE')) {
    header('location: ../index.php');
    die();
}
?>


<!-- ===Navbar start=== -->
<nav class="container-fluid bg-c1-1" style="height:250px;">

    <!-- <p class="text-center text-light">Copyright Group No:-18</p> -->
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <a class="navbar-brand" href=""> <img src="../img/mainlogo.png" style="width:170px;" alt="Logo"> </a>

                    <!-- <h5 class="text-uppercase text-light">Footer Content</h5> -->
                    <!-- <p class="text-light">Here you can use rows and columns to organize your footer content.</p> -->

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase text-light">Links</h5>

                    <ul class="list-unstyled">

                        <li>
                            <a href="customer_index.php" class="text-light">Home</a>
                        </li>
                        <!-- <li>
                            <a href="../signup.php" class="text-light">Signup as a Customer</a>
                        </li> -->
                        <li>
                            <a href="../sp_signup.php" class="text-light">Register as a Service Provider</a>
                        </li>
                        <li>
                            <a href="logout.php" class="text-light">Logout</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase text-light">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="serviceshow.php?category_id=84" class="text-light">Category</a>
                        </li>
                        <li>
                            <a href="order_details.php" class="text-light">My Orders</a>
                        </li>
                        <li>
                            <a href="mycart.php" class="text-light">Cart</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <!-- <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="/"> MDBootstrap.com</a>
        </div> -->
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</nav>
<!-- ===Navbar End=== -->