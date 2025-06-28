<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Edit House Details</h6>
        </div>

        <div class="card-body">

            <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

            if (isset($_POST['editbtn'])) {
                $id = $_POST['editid'];

                $sql = "SELECT * FROM house where H_ID='$id'";
                $rq = mysqli_query($con, $sql);

                if (mysqli_num_rows($rq) > 0) {
                    while ($row = mysqli_fetch_assoc($rq)) {
            ?>

            <form action="php/edithouse.php" method="POST">

                <input type="hidden" name="editid" value="<?php echo $row['H_ID']; ?>" required>
                <div class="form-group pl-4 pr-4">
                    <label><b> House No</b> </label>
                    <input type="text" name="hno" class="form-control" value="<?php echo $row['H_NO']; ?>" required>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>House Type</b> </label>
                    <select name="htype" class="form-control">
                        <option><?php echo $row['H_TYPE']; ?></option>
                        <option value="1bhk">1bhk</option>
                        <option value="2bhk">2bhk</option>
                        <option value="3bhk">3bhk</option>
                        <option value="4bhk">4bhk</option>
                        <option value="5bhk">5bhk</option>
                    </select>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Maintenance Charge</b> </label>
                    <input type="number" name="mcharge" class="form-control" value="<?php echo $row['H_CHARGE']; ?>" required>
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