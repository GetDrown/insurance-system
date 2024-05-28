<?php
include '../dbconf/db_config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "insert into users (username, password, role_id) values ('$username', '$password', 2)";


    if ($conn->query($sql) === TRUE) {
        echo "<script> function noticeMessage(){ " . "<br>" . "alert('Staff added!');" . "<br>" . "}";
        header("Location: ./src/admin-view/index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
