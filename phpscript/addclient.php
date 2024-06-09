<?php
include("../dbconf/db_config.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // login cred
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // personal data
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middle'];
    $name_ext = $_POST['name_ext'];

    // address
    $email = $_POST['email_add'];
    $address = $_POST['customeraddress'];
    $phone_num = $_POST['phone_num'];

    if ($confirm_password != $confirm_password) {
        die('Passwords do not Match');
    }
    // Insert data to user table
    $sql_user = 'insert into users (username, password, role_id) values (?, ?, 3)';
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param('ss', $username, $password);

    if ($stmt_user->execute()) {
        // get last inserted user ID
        $user_id = $stmt_user->insert_id;

        // Insert data into customer table
        $sql_customer = 'insert into customer (user_id, customer_lastname, 
        customer_firstname, customer_middle, 
        customer_nameExt, customer_phoneNum,
        customer_emailadd, customer_address) VALUES (?,?,?,?,?,?,?,?)';
        $stmt_customer = $conn->prepare($sql_customer);
        $stmt_customer->bind_param('isssssss', $user_id, $lastname, $firstname, $middlename, $name_ext, $phone_num, $email, $address);
    
        if ($stmt_customer->execute()) {
            header("Location: ../src/admin-view/clients.php");
            exit();
        } else {
            echo "Error: " . $stmt_customer->error;

        }

    } else {
        echo "Error: " . $stmt_user->error;
    }

}

$stmt_user->close();
$stmt_customer->close();
$conn->close();

?>
