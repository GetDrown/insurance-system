<?php
include '../dbconf/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $policy_id = $_POST["policy_selection"];
    $policy_quantity = $_POST["policy_quantity"];

    // check if policyId starts with nonlife or life
    if (strpos($policy_id, "non_life_") === 0) {
        $nonLifeId = str_replace('non_life_', '', $policy_id);
        $sql = "UPDATE non_life_policy SET non_life_qty = non_life_qty + ? WHERE non_life_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $policy_quantity, $nonLifeId);
    } else if (strpos($policy_id, "life_") === 0) {
        $lifeId = str_replace('life_', '', $policy_id);
        $sql = 'UPDATE life_policy SET life_qty = life_qty + ? WHERE life_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $policy_quantity, $lifeId);
    }
    if ($stmt) {
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            echo "Updated Quantity sucess";
            header("Location: ../src/admin-view/insurance.php");
        } else {
            echo "No records updated.";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement" . $conn->error;
    }
    
}
