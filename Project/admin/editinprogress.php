<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Unsolved Complaint</h6>
        </div>

        <div class="card-body">

            <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

            if (isset($_POST['editbtn'])) {
                $id = $_POST['editid'];

                $sql = "SELECT * FROM complaint where C_ID='$id'";
                $rq = mysqli_query($con, $sql);

                if (mysqli_num_rows($rq) > 0) {
                    while ($row = mysqli_fetch_assoc($rq)) {
            ?>

            <form action="php/editinprogress.php" method="POST">


                <div class="form-group pl-4 pr-4">
                    <label><b> Date</b> </label>
                    <input type="text" name="hno" readonly class="form-control" value="<?php echo $row['C_DATE']; ?>" required>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Subject</b> </label>
                    <input type="text" name="mcharge" readonly class="form-control" value="<?php echo $row['C_SUBJECT']; ?>" required>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Details</b> </label>
                    <input type="text" name="mcharge" readonly class="form-control" value="<?php echo $row['C_DETAILS']; ?>" required>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Status</b> </label>
                    <select name="status" class="form-control">
                        <option><?php echo $row['C_STATUS']; ?></option>
                        <option value="Pending">Pending</option>
                        <option value="Inprogress">Inprogress</option>
                        <option value="Solved">Solved</option> -->
                    </select>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label><b>Add Remark</b></label>
                    <textarea rows=6 class="form-control" name="remark" placeholder="Add Remark" required></textarea>
                </div>


                <?php
                    }

                }
            }

                ?>


        </div>

        <center>
            <div class="btn-group btn-group-lg">
                <button type="submit" name="submit" class="btn btn-success mb-4">Update</button>
            </div>
        </center>

        </form>


    </div>
</div>

</div>






<?php
include('includes/scripts.php');
include('includes/footer.php');
?>