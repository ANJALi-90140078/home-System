<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Send Notice</h6>
        </div>

        <div class="card-body">

            <form action="php/sendnotice.php" method="POST">



                <div class="form-group pl-4 pr-4 mt-4">
                    <label> Subject </label>
                    <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
                </div>
                <!-- <div class="form-group pl-4 pr-4">
                    <label>Date </label>
                    <input type="date" name="date" class="form-control" placeholder="Confirm Password" required>
                </div> -->
                <div class="form-group pl-4 pr-4">
                    <label>Description</label>
                    <textarea rows=6 class="form-control" name="desc" placeholder="Notice Description"></textarea>
                </div>



                <div class="modal-footer justify-content-center pl-5 pr-5">
                    <div class="btn-group btn-group-lg">
                        <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                        <button type="submit" name="send" class="btn btn-success pl-4 pr-4">Send</button>
                    </div>
                </div>

            </form>






        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>