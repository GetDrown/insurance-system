<?php
include '../dbconf/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['non_life_selection'])) {
        // customer
        $customer_id = $_POST['customer_id'];
        $non_life_selection = $_POST['non_life_selection'];
        $name = $_POST['name_and_address'];
        $business = $_POST['business_prof'];
        $date_issue = $_POST['date_issued'];
        $confirmation_cover = $_POST['conf_cover'];
        $official_receipt = $_POST['official_receipt'];
        $period_issuance_from = $_POST['from_issuance'];
        $period_issuance_to = $_POST['to_issuance'];
        // Vehicle Info
        $vehicle_model = $_POST['vehicle_model'];
        $vehicle_platenum = $_POST['vehicle_platenum'];
        $vehicle_make = $_POST['vehicle_make'];
        $vehicle_chassis = $_POST['vehicle_chassis'];
        $vehicle_type = $_POST['vehicle_type'];
        $vehicle_motornum = $_POST['vehicle_motornum'];
        $vehicle_color = $_POST['vehicle_color'];
        $vehicle_auth = $_POST['vehicle_auth'];
        $vehicle_blt = $_POST['vehicle_blt'];
        $vehicle_weight = $_POST['vehicle_weight'];

        $vehicle_total = $_POST['vehicle_totalpaid'];
        $form_endorsement = $_POST['form_endorsement'];


        // prepare SQL statement

        $sql = "INSERT INTO transactions (
            customer_id,
            non_life_id,
            name_and_address,
            date_of_issuance,
            from_issuance,
            to_issuance,
            vehicle_model,
            vehicle_plate,
            vehicle_make,
            vehicle_serialchassis,
            vehicle_typeofbody,
            vehicle_motornum,
            vehicle_color,
            vehicle_bltnum,
            vehicle_paid,
            form_endorsement) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "iissssssssssssss",
                $customer_id,
                $non_life_selection,
                $name,
                $date_issue,
                $period_issuance_from,
                $period_issuance_to,
                $vehicle_model,
                $vehicle_platenum,
                $vehicle_make,
                $vehicle_chassis,
                $vehicle_type,
                $vehicle_motornum,
                $vehicle_color,
                $vehicle_blt,
                $vehicle_total,
                $form_endorsement
            );
            if ($stmt->execute()) {
                echo "New Record";
                header("Location: ../src/admin-view/clients.php");
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
