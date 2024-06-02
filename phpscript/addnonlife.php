<?php
include '../dbconf/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // retrieve data
    $customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : null;

    // customer if valid
    if ($customer_id) {

        $sql = "select * from customers where customer_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $customer_id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
}
