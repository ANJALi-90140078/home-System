
<?php
include('includes/authadmin.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bolder text-dark">Edit Admin Profile</h6>
</div>

<div class="card-body">

<?php
        $con=mysqli_connect("localhost","root","","sms") or die("Connection Failed...");
       
if (isset($_POST['editbtn'])) 
{
    $id = $_POST['editid'];

    $sql = "SELECT * FROM member where M_ID='$id'";
    $rq = mysqli_query($con, $sql);

    if (mysqli_num_rows($rq) > 0) 
    {
        while ($row = mysqli_fetch_assoc($rq)) 
        {
?>

        <form action="#" method="POST">
               
                <div class="form-group">
                    <label> <b>Block </b></label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row['M_F_NAME']; ?>" required>
                </div>
                <div class="form-group">
                    <label><b> Username</b> </label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row['M_USERNAME']; ?>" required>
                </div>
                <div class="form-group">
                    <label> <b>Email</b> </label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['M_EMAIL']; ?>" required>
                </div>
                <div class="form-group">
                    <label> <b>Contact</b> </label>
                    <input type="tel" name="contact" class="form-control" value="<?php echo $row['M_PHONE']; ?>" required>
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
