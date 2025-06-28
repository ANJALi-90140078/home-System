<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">View Payment Due
            </h6>
        </div>


        <div class="card-body">

            <div class="table-responsive">
                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

                $sql = "SELECT `member`.*, `house`.*, `payment`.* FROM `member` LEFT JOIN `house` ON `member`.`HOUSE_H_ID` = `house`.`H_ID` 
                        LEFT JOIN `payment` ON `payment`.`HOUSE_H_ID` = `house`.`H_ID`
                        WHERE payment.MEMBER_M_ID IS NULL and payment.HOUSE_H_ID IS NULL and member.HOUSE_H_ID is not null and 
                        MONTH(P_DATE)=MONTH(now()) is null and YEAR(P_DATE)=YEAR(now()) is null order by (H_NO) ASC;";

                $chk = mysqli_query($con, $sql);

                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Name </th>
                            <th> Contact </th>
                            <th>House No</th>
                            <th>Maintenance Charge</th>
                            <!-- <th>Send Reminder </th> -->
                            <!-- <th>DELETE </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>

                        <tr>
                            <td><?php echo $row['M_F_NAME']; ?> </td>
                            <td><?php echo $row['M_PHONE']; ?> </td>
                            <td><?php echo $row['H_NO']; ?> </td>
                            <td><?php echo $row['H_CHARGE']; ?> </td>

                            <!-- <td>
                                <form action="editunsolved.php" method="post">

                                    <input type="hidden" name="editid" value="<?php echo $row['M_ID']; ?>" required>
                                    <input type="hidden" name="meditid" value="<?php echo $_SESSION['meditid'] = $row['M_ID']; ?>" required>
                                    <button type="submit" name="editbtn" class="btn btn-info"> Send Reminder</button>
                                </form>
                            </td> -->

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