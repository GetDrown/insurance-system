<?php
include '../dbconf/db_config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // user acc
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $confirm_pass = $_POST['re_enterpass'];
    // user info
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middle_ini = $_POST['middle_ini'];
    $name_ext = $_POST['name_ext'];
    // contacts and address
    $phone_num = $_POST['phone_num'];
    $email_add = $_POST['email_add'];
    $customer_add = $_POST['customeraddress'];

    // check pass if match
    if ($user_password != $confirm_pass) {
        die("Passwords don't match");
    }

    // insert data to user table
    $sql_user = 'insert into users (username, password, role_id) values (?, ?, 3)';
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param('ss', $user_name, $user_password);

    if ($stmt_user->execute()) {
        // get latest inserted user id
        $user_id = $stmt_user->insert_id;

        // Insert data to customer table
        $sql_customer = 'insert into customers (user_id, last_name, first_name, middle_ini, name_ext, phone_num, email_add, customer_address)
             values (?,?,?,?,?,?,?,?)';
        $stmt_customer = $conn->prepare($sql_customer);
        $stmt_customer->bind_param('isssssss', $user_id, $lastname, $firstname, $middle_ini, $name_ext, $phone_num, $email_add, $customer_add);

        if ($stmt_customer->execute()) {
            header('Location: ../src/admin-view/clients.php');
        } else {
            echo "Error: " . $stmt_customer->error;
        }
    } else {
        echo "Error: " . $stmt_user->error;
    }

    $stmt_user->close();
    $stmt_customer->close();
    $conn->close();
}
