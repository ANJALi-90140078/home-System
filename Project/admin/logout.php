
<?php
if (isset($_POST['logout_btn'])) {
    session_start();
    session_destroy();
    unset($_SESSION["ausername"]);
    header('Location: ../login/adminlogin.php'); 


}
?>