<?php
if (isset($_POST['logout_btn'])) {
    session_start();
    unset($_SESSION['susername']);
    session_destroy();

    header('Location: ../login/securitylogin.php');
}
?>