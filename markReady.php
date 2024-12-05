<?php
include_once 'ddb_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oid = $_POST['oid'];

    $update_query = "UPDATE orders SET status = 1 WHERE oid = $oid";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        header("Location: ready_orders.php");
        exit();
    } else {
        echo "Error updating order status: " . mysqli_error($connection);
    }
}
?>