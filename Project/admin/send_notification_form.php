<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Send Notification</h6>
        </div>

        <div class="card-body">

            <form action="php/sendnotification.php" method="post">

                <?php
                if (isset($_POST['editbtn'])) {
                    $id = $_POST['editid'];

                    $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                    $sql = "SELECT * FROM member where M_ID='$id'";
                    $chk = mysqli_query($con, $sql);
                }
                ?>

                <?php
                if (mysqli_num_rows($chk) > 0) {
                    while ($row = mysqli_fetch_assoc($chk)) {
                ?>


                <div class="form-group pl-4 pr-4">
                    <label> <b>Name</b></label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row['M_F_NAME']; ?>" required readonly>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Email</b></label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['M_EMAIL']; ?>" required readonly>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Contact Number</b> </label>
                    <input type="tel" name="contact" class="form-control" value="<?php echo $row['M_PHONE']; ?>" required readonly>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Message</b> </label>
                    <textarea type="text" name="msg" rows=4 class="form-control" placeholder="Type Message Here..." required></textarea>
                </div>

               

                <center>
                    <div class="btn-group btn-group-lg">
                    <input type="hidden" name="editid" value="<?php echo $row['M_ID'];?>">
                        <button type="submit" name="submit" class="btn btn-success">
                           Send Message</button>
                    </div>
                </center>
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
// include('includes/footer.php');
?>