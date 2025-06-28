<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Allocate House</h6>
        </div>

        <div class="card-body">

            <form action="phpEmail/email.php" method="post">

                <?php
                if (isset($_POST['editbtn'])) {
                    $id = $_SESSION['mid'];

                    $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                    $sql = "SELECT * FROM member where M_ID='$id'";
                    $chk = mysqli_query($con, $sql);
                }
                ?>

                <?php
                if (mysqli_num_rows($chk) > 0) {
                    while ($row = mysqli_fetch_assoc($chk)) {
                ?>

<input type="hidden" name="id" class="form-control" value="<?php echo $row['M_ID']; ?>">
                <div class="form-group pl-4 pr-4">
                    <label> <b>Name</b></label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row['M_F_NAME']; ?>" required readonly>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Email</b></label>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['M_EMAIL']; ?>" required readonly>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Contact Number</b> </label>
                    <input type="tel" name="contact" class="form-control" value="<?php echo $row['M_PHONE']; ?>" required readonly>
                </div>

                <?php
                    }
                }
                ?>


                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                $sql = "SELECT * FROM house";
                $chk = mysqli_query($con, $sql);


                ?>

                <div class="form-group pl-4 pr-4">
                    <label> <b>House Number</b> </label>
                    <select name="hno" class="form-control">
                        <option>Select House Number</option>
                        <?php
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>

                        <option value="<?php echo $row['H_NO']; ?>"><?php echo $row['H_NO']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group pl-4 pr-4">
                    <label> <b>Total Member</b> </label>
                    <input type="tel" name="totalmember" class="form-control" placeholder="Enter total member" required>
                </div>

                <center>
                    <div class="btn-group btn-group-lg">
                        <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                        <button type="submit" name="submit" class="btn btn-success">
                            Allocate House</button>
                    </div>
                </center>

            </form>



        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
// include('includes/footer.php');
?>