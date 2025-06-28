<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Make Payment</h6>
        </div>

        <div class="card-body">


            <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

            $id = $_SESSION["musername"];
            $sql1 = "SELECT * FROM member where M_USERNAME='$id'";
            $rq1 = mysqli_query($con, $sql1);



            if (mysqli_num_rows($rq1) > 0) {
                while ($row = mysqli_fetch_assoc($rq1)) {
                    $hid = $row['HOUSE_H_ID'];
                }
            }

            $sql = "SELECT `member`.*, `house`.* FROM `member` 
                    LEFT JOIN `house` ON `member`.`HOUSE_H_ID` = `house`.`H_ID`
                    WHERE member.M_USERNAME='$id' and house.H_ID='$hid'";

            $rq = mysqli_query($con, $sql);

            if (mysqli_num_rows($rq) > 0) {
                while ($row = mysqli_fetch_assoc($rq)) {
            ?>
                    <form action="makepaymentform.php" method="POST">

                        <input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION["musername"]; ?>" required>

                        <div class="form-group pl-4 pr-4">
                            <label> <b>Name </b></label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['M_F_NAME']; ?>" required readonly>
                        </div>

                        <div class="form-group pl-4 pr-4">
                            <label> <b>Email </b></label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['M_EMAIL']; ?>" required readonly>
                        </div>

                        <div class="form-group pl-4 pr-4">
                            <label><b> House Number</b> </label>
                            <input type="number" name="hno" id="hno" class="form-control" value="<?php echo $row['H_NO']; ?>" required readonly>
                        </div>

                        <div class="form-group pl-4 pr-4">
                            <label> <b>Payment Type</b> </label>
                            <select name="ptype" id="ptype" class="form-control">
                                <option>Select Payment Type</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Society Transfer Fee">Society Transfer Fee</option>
                                <option value="Donation">Donation</option>
                            </select>
                        </div>

                        <div class="form-group pl-4 pr-4">
                            <label> <b>Amount</b> </label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>

                        </div>
                <?php
                }
            }
                ?>

                <center>
                    <div class="btn-group btn-group-lg">



                        <button type="submit" name="submit" class="btn btn-success">Pay Now</button>

                        

                    </div>
                </center>

                    </form>

        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
?>








