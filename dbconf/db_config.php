<?php

$servername = "localhost"; //optional to add port number of the mysql server
$username = "root";
$password = "";
$dbname = "insurancesystem";
$port = 3307; //optional when default port is already being used.


$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
