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

            <form action="php/preguest.php" method="POST">

                <div class="form-group pl-4 pr-4">
                    <label>Arrival Time </label>
                    <input type="datetime-local" name="atime" class="form-control" required>
                </div>
                <div class="form-group pl-4 pr-4 mt-4">
                    <label>Guest Name </label>
                    <input type="text" name="gname" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group pl-4 pr-4">
                    <label>Contact</label>
                    <input type="tel" name="contact" class="form-control" placeholder="Phone number" required>
                </div>
                <div class="form-group pl-4 pr-4">
                    <label>Total Person</label>
                    <input type="tel" name="tp" class="form-control" placeholder="Enter Total Person" required>
                </div>


                <div class="modal-footer justify-content-center pl-5 pr-5">
                    <div class="btn-group btn-group-lg">
                        <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                        <button type="submit" name="submit" class="btn btn-success pl-4 pr-4">Add Guest</button>
                    </div>
                </div>

            </form>






        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
// include('includes/footer.php');
?>