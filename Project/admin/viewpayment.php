<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">View Payment
            </h6>
        </div>


        <div class="card-body">

            <div class="table-responsive">
                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

                $sql = "SELECT `member`.*, `house`.*, `payment`.* FROM `member` LEFT JOIN `house` ON `member`.`HOUSE_H_ID` = `house`.`H_ID` 
                        LEFT JOIN `payment` ON `payment`.`HOUSE_H_ID` = `house`.`H_ID`
                        WHERE payment.MEMBER_M_ID IS NOT NULL and member.HOUSE_H_ID is not null and
                        payment.MEMBER_M_ID=member.M_ID and
                        MONTH(P_DATE)=MONTH(now()) and YEAR(P_DATE)=YEAR(now()) order by H_NO ASC;";


                $chk = mysqli_query($con, $sql);

                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> House Number </th>
                            <th> Name </th>
                            <th>Contact No</th>
                            <th>Payment Type</th>
                            <th>Date </th>
                            <th>Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>

                        <tr>
                            <td>
                            <?php echo $row['H_NO']; ?> </td>
                            <td><?php echo $row['M_F_NAME']; ?> </td>
                            <td><?php echo $row['M_PHONE']; ?> </td>
                            <td><?php echo $row['P_TYPE']; ?> </td>
                            <td><?php echo $row['P_DATE']; ?> </td>
                            <td><?php echo $row['P_AMOUNT']; ?> </td>

                        </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>


                        <?php
          $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
          $sql = "SELECT sum(P_AMOUNT) as sum FROM payment where MONTH(P_DATE)=MONTH(now()) and YEAR(P_DATE)=YEAR(now())";
          $chk = mysqli_query($con, $sql);

          ?>
                        <?php
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>
                        <tr class="table-info">
                            <td colspan="5"><b>
                                    <center>Total</center>
                                </b> </td>
                            <td><b><?php echo $row['sum']; ?></b> </td>
                        </tr>

                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
// include('includes/footer.php');
?>