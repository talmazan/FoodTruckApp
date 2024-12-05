<?php
// Include database connection file
include_once 'ddb_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $item_id = $_POST['item'];
    $customer_name = $_POST['cname'];
    $location_id = $_POST['location'];
    $quantity = $_POST['qty'];

    // Insert order into the orders table
    $query = "INSERT INTO orders (lid, cname)
              VALUES ('$location_id', '$customer_name')";

    // Execute the query to insert order
    if (mysqli_query($connection, $query)) {
        // Get the ID of the last inserted order
        $order_id = mysqli_insert_id($connection);
        
        // Insert order item into the order_items table
        $order_item_query = "INSERT INTO order_items (oid, iid, qty)
                             VALUES ('$order_id', '$item_id', '$quantity')";
        
        // Execute the query to insert order item
        if (mysqli_query($connection, $order_item_query)) {
            echo "Order placed successfully.";
        } else {
            echo "Error inserting order item: " . mysqli_error($connection);
        }
    } else {
        echo "Error inserting order: " . mysqli_error($connection);
    }
} else {
    echo "Form submission failed.";
}
?>
