<?php
include("../dbconf/db_config.php");
// Check if all required parameters are set
if(isset($_GET['editStaffId'], $_GET['editStaffName'], $_GET['editStaffUserName'], $_GET['editStaffPassword'])) {
    // Assign values from GET parameters
    $id = $_GET['editStaffId'];
    $name = $_GET['editStaffName'];
    $username = $_GET['editStaffUserName'];
    $password = $_GET['editStaffPassword'];

    // Prepare and bind the SQL statement
    $sql = "UPDATE users SET username=?, password=?, name=? WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $password, $name, $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../src/admin-view/staff.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "All required parameters are not set.";
}
?>