<?php 
include("../dbconf/db_config.php");
$staffId = $_GET['staffId'];

$sql = "DELETE FROM users WHERE user_id = $staffId";

if ($conn->query($sql) === TRUE) {
    header("Location: ../src/admin-view/staff.php");
} else {
    echo "Error deleting record: " . $conn->error;
}