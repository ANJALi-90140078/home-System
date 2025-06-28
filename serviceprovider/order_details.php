<?php
include '../db/dbconnect.php';
$title = 'Order view';
include 'assets/include/sp_header.php';
?>

<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <div class="row ">
        <div class="col-lg-5">
            <h5 class="mb-0"><strong>Order Details </strong></h5>
            <span class="text-secondary">Workspace<i class="fa fa-angle-right"></i> Order details</span>
        </div>
        <div class="col-md-auto col-lg-7">
            <!-- error area -->
            <!-- Message section -->
            <?php
            //Alert OR Error Message:
            if (isset($_SESSION['status_done'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> ' . $_SESSION['status_done'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['status_done']);
            } elseif (isset($_SESSION['status_undone'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> ' . $_SESSION['status_undone'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['status_undone']);
            }
            ?>
        </div>
    </div>



    <?php
    if (isset($_GET['order_id']) && isset($_GET['sp_id'])) {
        $order_id = $_GET['order_id'];
        $sp_id = $_GET['sp_id'];
    ?>


        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                    <!--Order Listing-->
                    <u>
                        <h4 class="mb-5"><strong>Order Id is <?php echo $order_id; ?></strong></h4>
                    </u>

                    <div class="product-list">
                        <div class="table-responsive product-list">
                            <table class="table table-bordered table-striped mt-3" id="productList">
                                <thead>
                                    <tr>
                                        <th scope="row">Sno.</th>
                                        <th scope="row">Service title</th>
                                        <th>Price</th>
                                        <th>Qty.</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    // $query1 = "SELECT * FROM `user_order` WHERE `service_id` IN (SELECT `service_id` FROM `user_order` WHERE `order_id` = $order_id)";
                                    $query1 = "SELECT * FROM `user_order` WHERE `order_id` = $order_id AND `sp_id` = $sp_id";
                                    $result1 = mysqli_query($conn, $query1);
                                    $total = 0;
                                    $sno = 0;
                                    if ($result1) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            $service_id = $row1['service_id'];
                                            $service_title = $row1['service_title'];
                                            $price = $row1['price'];
                                            $qty = $row1['qty'];
                                            $status = $row1['status'];
                                            $line_total = $price * $qty;
                                            $total = $total + $line_total;
                                            $sno = $sno + 1;
                                            //fetch from order_master table for order-customer details
                                    ?>
                                            <tr>
                                                <td scope="row"><?php echo $sno ?></td>
                                                <td scope="row"><?php echo $service_title ?></td>
                                                <td><?php echo $price ?></td>
                                                <td><?php echo $qty ?></td>
                                                <!-- <td><?php echo $status ?></td> -->
                                                <td class="align-middle">
                                                    <?php
                                                    if ($status == 'pending') {
                                                        echo '<span class="badge badge-warning">Pending</span>';
                                                    }
                                                    if ($status == 'rejected') {
                                                        echo '<span class="badge badge-danger">Rejected</span>';
                                                    }
                                                    if ($status == 'inprogress') {
                                                        echo '<span class="badge badge-primary">In Progress</span>';
                                                    }
                                                    if ($status == 'completed') {
                                                        echo '<span class="badge badge-success">Completed</span>';
                                                    }
                                                    if ($status == 'uncompleted') {
                                                        echo '<span class="badge badge-secondary">Uncompleted</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $line_total ?></td>



                                                <td>
                                                    <?php
                                                    if ($status == 'pending') {
                                                    ?>
                                                        <form action="_order_status.php" method="POST">
                                                            <button type="submit" name="approve" class="btn btn-success btn-sm" title="Approve"><i class="fa fa-check"></i></button>
                                                            <button type="submit" name="reject" class="btn btn-danger btn-sm" title="Reject"><i class="fa fa-close"></i></button>

                                                            <input type="hidden" name="status" value="<?php echo $status ?>">
                                                            <input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
                                                            <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                                                            <input type="hidden" name="service_id" value="<?php echo $service_id ?>">
                                                        </form>
                                                    <?php
                                                    }
                                                    if ($status == 'inprogress' || $status == 'completed' || $status == 'uncompleted') {
                                                    ?>
                                                        <form action="_order_status.php" method="POST">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <center>
                                                                        <button type="submit" name="completed" class="btn btn-success m-2">Completed</button>
                                                                        <button type="submit" name="uncompleted" class="btn btn-danger m-2">Unompleted</button>

                                                                        <input type="hidden" name="status" value="<?php echo $status ?>">
                                                                        <input type="hidden" name="sp_id" value="<?php echo $sp_id ?>">
                                                                        <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                                                                        <input type="hidden" name="service_id" value="<?php echo $service_id ?>">
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                } else {
                                    echo '
                                    <script>
                                        window.location.href = "order_view.php";
                                    </script>
                                    ';
                                }
                                //fetch from order_master table for order-customer details
                                ?>

                                </tbody>
                            </table>
                            <a href="order_view.php" class="btn btn-primary text-light mt-5">Back to Order</a>
                            <div class="text-right mt-4 p-4">
                                <!-- <p><strong>Sub - Total amount: $14,768.00</strong></p>
                                <p><strong>Shipping: $1000.00</strong></p>
                                <p><span>vat(10%): $150.00</span></p> -->
                                <h2 class="mt-2"><strong>Total: &#8377; <?php echo $total ?>/-</strong></h2>
                            </div>
                        </div>
                    </div>
                    <!--/Order Listing-->
                </div>













            </div>
        </div>

        <?php
        include 'assets/include/sp_footer.php';
        ?>