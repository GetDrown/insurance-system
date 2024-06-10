<?php
include '../../dbconf/db_config.php';

if (isset($_POST['non_life_id'])) {
    $non_life_id = $_POST['non_life_id'];

    $sql = "SELECT non_life_premium, non_life_docstamp, non_life_govtax, non_life_others 
    FROM non_life_policy WHERE non_life_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $non_life_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
}
