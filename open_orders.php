<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Orders</title>
</head>
<body>
    <h2>Open Orders</h2>
    <nav>
        <ul>
            <li><a href="findex.php">Home</a></li>
            <li><a href="ready_orders.php">Ready</a></li>
            <li><a href="day_sales.php">Day Sales</a></li>
            <li><a href="inventory.php">Inventory</a></li>
        </ul>
    </nav>
    <?php
    include_once 'ddb_connection.php';

    $query = "SELECT orders.oid, location.lname, item.name, item.description, item.qty
              FROM orders
              INNER JOIN location ON orders.lid = location.lid
              INNER JOIN order_items ON orders.oid = order_items.oid
              INNER JOIN item ON order_items.iid = item.iid
              WHERE orders.status = 0";

    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>";
                echo "<p>Order ID: {$row['oid']}</p>";
                echo "<p>Location: {$row['lname']}</p>";
                echo "<p>Item: {$row['name']}</p>";
                echo "<p>Description: {$row['description']}</p>";
                echo "<p>Quantity: {$row['qty']}</p>";
                echo"<form method='post' action='markReady.php'><input type='hidden' name='oid' value='{$row['oid']}'><button type='submit'>Mark Ready</button></form>";
                echo "</div>";
            }
        } else {
            echo "No open orders.";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    ?>



</body>
</html>
