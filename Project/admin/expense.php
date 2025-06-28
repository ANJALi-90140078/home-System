<?php
include('includes/authadmin.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bolder text-dark">Add Expense Details</h6>
</div>

<div class="card-body">

<form action="php/addexpense.php" method="post">

            <div class="form-group pl-4 pr-4 mt-4">
                <label>Subject </label>
                <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
            </div>
            <div class="form-group pl-4 pr-4">
                <label>To Whome</label>
                <input type="text" name="towhome" class="form-control" placeholder="To Whome" required>
            </div>
            <div class="form-group pl-4 pr-4">
                <label>Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
            </div>
               
        <center>
            <div class="btn-group btn-group-lg pl-4 pr-4 mt-4">
           <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
            <button type="submit" name="add" class="btn btn-success pl-4 pr-4">Add bill</button>
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