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
        <br>
        <br>



        <?php
        $customer_id = $_SESSION['customer_id'];
        $query1 = "SELECT * FROM `order_master` WHERE `customer_id` = $customer_id ORDER BY order_id DESC";
        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $order_id = $row1['order_id'];
                $full_name = $row1['full_name'];
                $delivery_address = $row1['address'];
                $pay_mode = $row1['pay_mode'];
                $total = $row1['total'];
                $order_date = $row1['order_date'];
                $due_date = $row1['due_date'];
                $estimated_date = date('j F, Y g:i A', strtotime($due_date));
                $real_order_date = date('j F, Y', strtotime($order_date));
        ?>

                <div class="bg-dark p-5">

                    <div class="table-responsive-sm mt-3 ">
                        <table class="table table-hover table-dark p-5 ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan="5">Order Confirmation <?php echo $order_id; ?> </th>
                                    <th scope="col" colspan="2">Order Date:</th>
                                    <th scope="col" colspan="2"><?php echo $real_order_date; ?> </th>
                                </tr>
                                <tr>
                                    <th scope="col">Sno. </th>
                                    <th scope="col">Service name</th>
                                    <th scope="col">Service prvider name</th>
                                    <th scope="col">Phone(SP)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Qty.</th>
                                    <th scope="col">Price(&#8377;)</th>
                                    <th scope="col">Total(&#8377;)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 0;
                                $query2 = "SELECT * FROM `user_order` WHERE `order_id` = $order_id";
                                $result2 = mysqli_query($conn, $query2);
                                if ($result2) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        $service_title = $row2['service_title'];
                                        $price = $row2['price'];
                                        $qty = $row2['qty'];
                                        $status = $row2['status'];
                                        $sp_id = $row2['sp_id'];
                                        $sno += 1;

                                        $spname = "SELECT * FROM `sp` WHERE sp_id = $sp_id";
                                        $spname_result = mysqli_query($conn, $spname);
                                        while ($sprow = mysqli_fetch_assoc($spname_result)) {
                                            $sp_name = $sprow['sp_name'];
                                            $phone = $sprow['phone'];
                                        }

                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $sno ?></th>
                                            <td><?php echo $service_title  ?></td>
                                            <td class="align-middle"><?php echo $sp_name  ?></td>
                                            <td><?php echo $phone  ?></td>
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
                                            <td><?php echo $qty  ?></td>
                                            <td><?php echo $price  ?></td>
                                            <td><?php echo $price * $qty  ?></td>
                                        </tr>


                                <?php
                                    } //while row2 end
                                } // if result 2 end

                                ?>
                            </tbody>
                            <!-- total amount -->
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="4">
                                    <h3>TOTAL</h3>
                                </th>
                                <td>
                                    <h3>&#8377; <?php echo $total ?></h3>
                                </td>
                            </tr>
                            <!-- delivery address -->
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="4">Delivery Address</th>
                                <td><?php echo $delivery_address ?></td>
                            </tr>
                            <!-- Estimate date -->
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="4">Estimated Delivery Date</th>
                                <td><?php echo $estimated_date ?></td>
                            </tr>
                            <tr>
                                <th colspan="7"></th>
                                <td>
                                    <form action="../php/invoice.php" method="post">
                                        <button type="submit" name="invoice" class="btn btn-success">Invoice</button>
                                        <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                                        <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>">
                                        <!-- <button class="btn btn-danger">Cancel Order</button> -->
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
        <?php
            } //while result1 end
        } //if result1 end

        ?>

    </div>





















    <?php
    include '../includes/footer.php';
    // include 'includes/navfooter.php';
    ?>