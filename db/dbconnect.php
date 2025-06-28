
<?php

// connecting to the database
    $server = "localhost";
    $username = "root"; // The default username in XAMPP
    $password = ""; // XAMPP's MySQL password for 'root' is usually empty
    $database = "hs"; // Ensure this matches the actual database name

// create a connection
$conn = mysqli_connect($server, $username, $password, $database);

// Die if connecton was not successful
if (!$conn) {
    die("Sorry! We failed to connect: " . mysqli_connect_error());
}
    else{
        echo "connection successful!<br>";
    }
?>