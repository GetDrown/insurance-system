<?php
include '../../dbconf/db_config.php';


$customer_id = $_GET['customer_id'];

$sql = "SELECT
        t.non_life_id,
        t.date_of_issuance,
        p.non_life_name,
        p.policy_type
    FROM transactions t
    JOIN non_life_policy p
    ON  t.non_life_id = p.non_life_id
    WHERE t.customer_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

$rows = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $year = date('m-d-Y', strtotime($row['date_of_issuance']));
        $rows = "<tr>
                 <td class='py-3 border border-lime-500 text-center'>{$row['non_life_id']}</td>
                    <td class='py-3 border border-lime-500 text-center'>{$year}</td>
                    <td class='py-3 border border-lime-500 text-center'>{$row['non_life_name']}</td>
                    <td class='py-3 border border-lime-500 text-center'>{$row['policy_type']}</td>
                    <td class='py-3 border border-lime-500 text-center flex items-center justify-center'>
                        <div id='status' class='w-[100px] text-green-600 bg-white p-2 font-semibold'>Active</div>
                    </td>
                    <td class='py-3 border border-lime-500 text-center'>
                        <button class='w-[100px] text-white bg-amber-600 p-1 font-semibold rounded-md'>Renew</button>
                    </td>
                  </tr>";
    }
} else {
    $rows = "<tr><td colspan='6' class='py-3 border border-lime-500 text-center'>No transactions found.</td></tr>";
}



echo $rows;

$stmt->close();
$conn->close();
