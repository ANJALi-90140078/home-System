
<?php
session_start();
if(!isset($_SESSION["musername"]))
{
    header("Location: ../Login/memberlogin.php");
}

?>


    