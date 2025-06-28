<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Add Guest Details</h6>
        </div>

        <div class="card-body">

            <form action="php/addguest.php" method="post">

                <div class="form-group pl-4 pr-4 mt-4">
                    <label>House Number </label>
                    <input type="tel" name="hn" class="form-control" placeholder="Enter House Number">
                </div>

                <div class="form-group pl-4 pr-4">
                    <label>Total Guest </label>
                    <input type="text" name="tg" class="form-control" placeholder="Enter Total Guest">
                </div>
                <div class="form-group pl-4 pr-4">
                    <label>Guest Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Guest Name">
                </div>
                <div class="form-group pl-4 pr-4">
                    <label>Guest Contact</label>
                    <input type="tel" name="contact" class="form-control" placeholder="Enter Guest Contact"
                        minlength=10>
                </div>

                <center>
                    <div class="btn-group btn-group-lg pl-4 pr-4 mt-4">
                        <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                        <button type="submit" name="add" class="btn btn-success pl-4 pr-4">Add Guest</button>
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