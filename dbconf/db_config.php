<?php

$servername = "localhost"; //optional to add port number of the mysql server
$username = "root";
$password = "";
$dbname = "insurancesystem";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
