<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Change Password</h6>
        </div>

        <div class="card-body">
            <form action="php/changepass.php" method="POST">
            <input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION["susername"]; ?>">
                <div class="form-group pl-4 pr-4">
                    <label> <b>Current Password </b></label>
                    <input type="text" name="cpass" class="form-control" placeholder="Current Password">
                </div>
                <div class="form-group pl-4 pr-4">
                    <label><b> New Password</b> </label>
                    <input type="text" name="npass" class="form-control" placeholder="New Password">
                </div>
                <div class="form-group pl-4 pr-4">
                    <label> <b>Confirm Password</b> </label>
                    <input type="text" name="cnpass" class="form-control" placeholder="Confirm Password">
                </div>

        </div>
        <center>
            <div class="btn-group btn-group-lg mb-4">
                <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                <button type="submit" name="changepass" class="btn btn-success">Change Password</button>
            </div>
        </center>

        </form>



    </div>
</div>

</div>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>