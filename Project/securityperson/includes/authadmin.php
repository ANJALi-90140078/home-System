
<?php
session_start();
if(!isset($_SESSION["susername"]))
{
    header("Location: ../Login/securitylogin.php");
}

?>


    