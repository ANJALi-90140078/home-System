<?php

session_start();

unset($_SESSION['sp_loggedin']);
// session_unset();
session_destroy();

header("location: ../index.php");
exit;
?>