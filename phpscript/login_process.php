<?php
include('../dbconf/db_config.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['user_role'];

    $sql = "SELECT * FROM users WHERE username='$username' AND role_id='$role_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user["password"]) {
            session_start();
            $_SESSION["username"]  = $username;
            $_SESSION["user_role"] = $role_id;
            $_SESSION["user_id"] = $userId['user_id'];


            // redirect base on role
            switch ($role_id) {
                case 1:
                    header('Location: ../src/admin-view/index.php');

                    break;
                case 2:
                    header('Location: ../src/staff-view/index.php');

                    break;
                case 3:
                    header('Location: ../src/customer-view/index.php');

                    break;
                default:
                    echo "Invalid selection";
                    break;
            }
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
