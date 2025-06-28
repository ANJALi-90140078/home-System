<?php
define('MYSITE', true);
include '../db/dbconnect.php';


$title = 'Main';
$css_directory = '../css/main.min.css';
$css_directory2 = '../css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<body>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <?php
                //Alert OR Error Message:
                if (isset($_SESSION['removesuccess'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> ' . $_SESSION['removesuccess'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    unset($_SESSION['removesuccess']);
                } elseif (isset($_SESSION['removeunsuccess'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops! </strong> ' . $_SESSION['removeunsuccess'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    unset($_SESSION['removeunsuccess']);
                }
                ?>
                <div class="text-center border rounded bg-light my-4">
                    <h4>CART</h4>
                </div>
            </div>


            <?php
            if (!isset($_SESSION['cart']) || $_SESSION['cart'] != true) {
            ?>

                <div class="container-fluid mt-5">
                    <div class="row align-self-center">
                        <div class="col-md-12">
                            <div class="card" style="border:none;">
                                <!-- <div class="card-header">
                                        <h5>Cart</h5>
                                    </div> -->
                                <div class="card-body">
                                    <div class="col-sm-12 empty-cart-cls text-center">
                                        <!-- <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"> -->
                                        <img src="../img/EMPTY_CART.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                        <h3><strong>Your Cart is Empty</strong></h3>
                                        <h5 class="text-secondary">You will find a lot of interesting services on our "Service" page :)</h5>
                                        <a href="customer_index.php" class="btn btn-c1-1 cart-btn-transform m-3" data-abc="true">continue shopping</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-lg-9">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Service</th>
                                <th scope="col">Service Provider</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $sr; ?></th>
                                    <td><?php echo $value['service_title']; ?></td>
                                    <td><?php echo $value['sp_name']; ?></td>
                                    <td>
                                        <small>&#8377;</small><?php echo $value['price']; ?>
                                        <input type="hidden" class="iprice" value="<?php echo $value['price']; ?>">
                                    </td>
                                    <!-- quantity -->
                                    <form action="manage_cart.php" method="post">
                                        <td><input type="number" pattern="[1-9]\d*" class="text-center iquantity" name="Mod_Quantity" onchange="this.form.submit();" value="<?php echo $value['quantity']; ?>"  min="1" step="1" oninput="validity.valid||(value='');"></td>
                                        <input type="hidden" name="service_title" value="<?php echo $value['service_title']; ?>">
                                    </form>
                                    <!-- line Total -->
                                    <td class="itotal"></td>
                                    <!-- remove button -->
                                    <td>
                                        <form action="manage_cart.php" method="post">
                                            <button class="btn btn-sm btn-outline-danger" name="remove_service">Remove</button>
                                            <input type="hidden" name="service_title" value="<?php echo $value['service_title']; ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-3">
                    <div class="border bg-light rounded p-4">
                        <h4>Grand Total:</h4>
                        <div class="text-right">
                            <h6 style="display:inline-block;">&#8377;</h6>
                            <h5 style="display:inline-block;" id="gtotal"></h5>
                            <h5 style="display:inline-block;" id="">/-</h5>
                        </div>

                        <?php
                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        ?>
                            <form action="order.php" method="post">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="full_name" id="fullname"pattern="^[a-zA-Z\s]{3,}$" required>
                                    <div class="invalid-feedback">Name should only contain letters and spaces, and must be at least 3 characters long.</div>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" class="form-control" required pattern="^\d{10}$" name="phone" aria-describedby="phoneFeedback" data-for="phoneNumber">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address" cols="25" rows="3" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input type="text" class="form-control" pattern="\d{6}" name="pincode" id="pincode" required>
                                </div>

                                <div class="form-group">
                                    <label>Service Date:-</label>
                                    <input type="datetime-local" class="form-control" name="due_date" id="due_date" required>
                                    <small class="text-secondary">which DATE & TIME you want a service</small>
                                    <div class="invalid-feedback">
                                       <p id="error-message"></p> 
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pay_mode" id="exampleRadios1" value="COD" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pay_mode" id="exampleRadios2" value="Gpay">
                                    <label class="form-check-label" for="exampleRadios2">
                                        GPay
                                    </label>
                                </div> -->
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="order">Make Order</button>
                                <input type="hidden" id="total" name="total">

                            </form>
                        <?php
                        }
                        ?>


                    </div>
                </div>



        </div>
    </div>


<?php
                //first session cart start che k nai te check krti vakhate else loop no end
            }
?>
<script>
    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    function subTotal() {
        gt = 0;
        for (i = 0; i < iprice.length; i++) {
            itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
            gt = gt + (iprice[i].value) * (iquantity[i].value);
            var myVariable = gt;
            localStorage.setItem("myVar", myVariable);
        }


        //print grand total
        gtotal.innerText = gt;
        document.getElementById("total").value = gt;
    }

    subTotal();
</script>


<!-- date time validation  -->
<script>
    const datetimeInput = document.getElementById("due_date");
    const errorMessage = document.getElementById("error-message");

    datetimeInput.addEventListener("input", function() {
        const selectedDatetime = new Date(datetimeInput.value);
        const now = new Date();
        if (selectedDatetime < now) {
            errorMessage.textContent = "Please select a future date and time.";
            datetimeInput.setCustomValidity("Please select a future date and time.");
        } else {
            errorMessage.textContent = "";
            datetimeInput.setCustomValidity("");
        }
    });
</script>


<?php
include '../includes/footer.php';
// include 'includes/navfooter.php';
?>