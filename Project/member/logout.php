<?php
if (isset($_POST['logout_btn'])) {
    session_start();
    session_destroy();
    unset($_SESSION["musername"]);
    header('Location: ../login/memberlogin.php'); 


}
?>