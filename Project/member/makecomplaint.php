<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Make Complaint</h6>
        </div>

        <div class="card-body">


        <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

            $id = $_SESSION["musername"];
            $sql = "SELECT * FROM member where M_USERNAME='$id'";
            $rq = mysqli_query($con, $sql);

            if (mysqli_num_rows($rq) > 0) {
                while ($row = mysqli_fetch_assoc($rq)) {
            ?>

            <form action="php/makecomplaint.php" method="POST">

                <input type="hidden" name="id" class="form-control" value="<?php echo $row['M_ID'];?>" required>
                <!-- <div class="form-group pl-4 pr-4">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div> -->

                <!-- <div class="form-group pl-4 pr-4"> -->
                    <!-- <label> <b>Status</b> </label> -->
                    <!-- <select name="gender" class="form-control">
                        <option>Select Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Inprogress">Inprogress</option>
                        <option value="Solved">Solved</option> -->
                    <!-- </select> -->
                <!-- </div> -->

                <div class="form-group pl-4 pr-4 mt-4">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required>
                </div>
                <div class="form-group pl-4 pr-4">
                    <label>Details</label>
                    <textarea rows="5" name="desc" class="form-control" placeholder="Enter Details"></textarea>
                </div>


                <div class="modal-footer justify-content-center pl-5 pr-5">
                    <div class="btn-group btn-group-lg">
                        <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                        <button type="submit" name="submit" class="btn btn-success pl-4 pr-4">Register
                            Complaint</button>
                    </div>
                </div>
                <?php
                }
            }
                ?>

            </form>






        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
?>