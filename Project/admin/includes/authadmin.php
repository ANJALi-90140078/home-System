
<?php
session_start();
if(!isset($_SESSION["ausername"]))
{
    header("Location: ../Login/adminlogin.php");
}

?>