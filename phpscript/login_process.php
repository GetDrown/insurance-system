<?php
include("../dbconf/db_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['user_role'];


    // $sql = "SELECT * FROM users WHERE username='$username' AND role_id='$role_id'";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     $user = $result->fetch_assoc();
    //     if ($password == $user["password"]) {
    //         session_start();
    //         $_SESSION["username"]  = $username;
    //         $_SESSION["user_role"] = $role_id;
    //         $_SESSION["user_id"] = $user['user_id'];


    //         // redirect base on role
    //         switch ($role_id) {
    //             case 1:
    //                 header('Location: ../src/admin-view/index.php');
    //                 break;
    //             case 2:
    //                 header('Location: ../src/staff-view/index.php');

    //                 break;
    //             case 3:
    //                 header('Location: ../src/customer-view/index.php');
    //                 break;
    //             default:
    //                 echo "Invalid selection";
    //                 break;
    //         }
    //         exit();
    //     } else {
    //         echo "Invalid password";
    //     }
    // } else {
    //     echo "No user found";
    // }
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ? AND role_id = ?');
    $stmt->bind_param('si', $username, $role_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // verify pass
        if ($password == $user['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $role_id;
            $_SESSION['user_id'] = $user['user_id'];

            if ($role_id == 3) {
                $user_id = $user["user_id"];
                $customer_stmt = $conn->prepare("SELECT customer_id FROM customers WHERE user_id = ?");
                $customer_stmt->bind_param("i", $user_id);
                $customer_stmt->execute();
                $customer_result = $customer_stmt->get_result();

                if ($customer_result->num_rows > 0) {
                    $customer = $customer_result->fetch_assoc();
                    $_SESSION["customer_id"] = $customer["customer_id"];
                } else {
                    echo "Customer Not Found";
                    exit();
                }
            }
            switch ($role_id) {
                case 1:
                    header("Location: ../src/admin-view/index.php");
                    break;
                case 2:
                    header("Location: ../src/staff-view/index.php");
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
            echo "Invalid pAss";
        }
    } else {
        echo "No user found";
    }

    $stmt->close();
}
