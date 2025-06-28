<?php
include '../db/dbconnect.php';
$title = 'Order view';
include 'assets/include/sp_header.php';
?>


<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <div class="row ">
        <div class="col-lg-5">
            <h5 class="mb-0"><strong>Order</strong></h5>
            <span class="text-secondary">Workspace<i class="fa fa-angle-right"></i> Order</span>
        </div>
        <div class="col-md-auto col-lg-7">
            <!-- error area -->
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
            <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                <!--Order Listing-->
                <div class="product-list">
                    <div class="table-responsive product-list">
                        <table class="table table-bordered table-striped mt-3" id="productList">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Pincode</th>
                                    <th>Pay mode</th>
                                    <th>Order date</th>
                                    <th>Due date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sp_id = $_SESSION['sp_id'];
                                $query1 = "SELECT * FROM `order_master` WHERE `order_id` IN (SELECT `order_id` FROM `user_order` WHERE sp_id = $sp_id)";
                                $result1 = mysqli_query($conn, $query1);
                                if ($result1) {
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $order_id = $row1['order_id'];
                                        $customer_id = $row1['customer_id'];
                                        $full_name = $row1['full_name'];
                                        $phone = $row1['phone'];
                                        $address = $row1['address'];
                                        $pincode = $row1['pincode'];
                                        $pay_mode = $row1['pay_mode'];
                                        $total = $row1['total'];
                                        $fake_order_date = $row1['order_date'];
                                        $order_date = date('j F, Y g:i A', strtotime($fake_order_date));
                                        $fake_due_date = $row1['due_date'];
                                        $due_date = date('j F, Y g:i A', strtotime($fake_due_date));


                                ?>


                                        <tr>
                                            <td class="align-middle"><?php echo $order_id ?></td>
                                            <td class="align-middle"><?php echo $full_name ?></td>
                                            <td class="align-middle"><?php echo $phone ?></td>
                                            <td class="align-middle"><?php echo $address ?></td>
                                            <td class="align-middle"><?php echo $pincode ?></td>
                                            <td class="align-middle"><?php echo $pay_mode ?></td>
                                            <td class="align-middle"><?php echo $order_date ?></td>
                                            <td class="align-middle"><?php echo $due_date ?></td>

                                                <td class="align-middle text-center">

                                                <a href="order_details.php?order_id=<?php echo $order_id ?>&sp_id=<?php echo $sp_id ?>"><button class="btn btn-theme mb-2" title="See Order Details">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>
                                                <!-- <button class="btn btn-success mb-2" data-toggle="modal" data-target="#orderUpdate"><i class="fa fa-pencil"></i></button> -->
                                                <!-- <button class="btn btn-danger mb-2"><i class="fas fa-trash"></i></button> -->
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                       
                    </div>
                </div>
                <!--/Order Listing-->


                <!--Order Info Modal-->
                <!-- <div class="modal fade bd-example-modal-lg" id="orderInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Order Id: <?php echo $order_id; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="row">Service title</th>
                                            <th>Price</th>
                                            <th>Qty.</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                                <tr>
                                                    <td scope="row">service_title</td>
                                                    <td>price</td>
                                                    <td>qty</td>
                                                    <td>status</td>
                                                </tr>
                                    
                                    </tbody>
                                </table>

                                <div class="text-right mt-4 p-4">
                                    <p><strong>Sub - Total amount: $14,768.00</strong></p>
                                    <p><strong>Shipping: $1000.00</strong></p>
                                    <p><span>vat(10%): $150.00</span></p>
                                    <h4 class="mt-2"><strong>Total: $16,050.00</strong></h4>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--Order Info Modal-->








                <!--Order Update Modal-->
                <!-- <div class="modal fade" id="orderUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ord#13 details update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="row">Item</th>
                                            <th class="order-qty-head">Quantity</th>
                                            <th>Unit price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">01</td>
                                            <td scope="row" class="align-middle">Red Shoes</td>
                                            <td class="text-center align-middle"><input type="text" value="2" class="order-qty"></td>
                                            <td class="align-middle">$400</td>
                                            <td class="align-middle">$800</td>
                                            <td style="width: 120px;" class="align-middle">
                                                <button class="btn btn-theme mr-1"><i class="fa fa-pencil-square-o"></i></button>
                                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">02</td>
                                            <td class="align-middle" scope="row">Blue shirt</td>
                                            <td class="text-center align-middle"><input type="text" value="1" class="order-qty"></td>
                                            <td class="align-middle">$400</td>
                                            <td class="align-middle">$400</td>
                                            <td class="align-middle">
                                                <button class="btn btn-theme mr-1"><i class="fa fa-pencil-square-o"></i></button>
                                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">03</td>
                                            <td class="align-middle" scope="row">Knickers</td>
                                            <td class="text-center align-middle"><input type="text" value="3" class="order-qty"></td>
                                            <td class="align-middle">$300</td>
                                            <td class="align-middle">$900</td>
                                            <td class="align-middle">
                                                <button class="btn btn-theme mr-1"><i class="fa fa-pencil-square-o"></i></button>
                                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="text-right mt-4 p-4">
                                    <p><strong>Sub - Total amount: $14,768.00</strong></p>
                                    <p><strong>Shipping: $1000.00</strong></p>
                                    <p><span>vat(10%): $150.00</span></p>
                                    <h4 class="mt-2"><strong>Total: $16,050.00</strong></h4>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--Order Update Modal-->
            </div>













        </div>
    </div>


    <?php
    include 'assets/include/sp_footer.php';
    ?>