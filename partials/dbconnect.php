<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Showtime";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "<p>Could not connect to the server '" . $database . "'</p>\n";
    echo mysql_error();
}

?>