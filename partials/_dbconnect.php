<?php
$server = "localhost";
$username = "root";
$password = "sanskar@FCOW18113";
$database = "opd";

$conn = mysqli_connect($server, $username, $password, $database, "3309");
if (!$conn){
    die("Error". mysqli_connect_error());
}

?>
