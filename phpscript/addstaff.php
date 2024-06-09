<?php
include '../dbconf/db_config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "insert into users (username, password, role_id, name) values ('$username', '$password', 2, '$name')";


    if ($conn->query($sql) === TRUE) {
        echo "<script> function noticeMessage(){ " . "<br>" . "alert('Staff added!');" . "<br>" . "} </script?>";
header("Location: ../src/admin-view/staff.php");
exit();
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}