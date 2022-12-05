<?php
/* Local Database*/

$servername = "localhost";
$username = "thekambh_Gatogo";
$password = "Ga@1540948579";
$dbname = "thekambh_hotel_billing1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?> 