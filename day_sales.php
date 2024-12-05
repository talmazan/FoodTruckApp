<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Sales</title>
</head>
<body>
    <h2>Day Sales</h2>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="open_orders.php">Open</a></li>
            <li><a href="ready_orders.php">Ready</a></li>
            <li><a href="inventory.php">Inventory</a></li>
        </ul>
    </nav>
    <?php
    include_once 'ddb_connection.php';

    $query = "SELECT orders.oid, item.cost
              FROM orders
              INNER JOIN item ON orders.iid = item.iid
              WHERE orders.status = 1";
    $result = mysqli_query($connection, $query);

    $total_sales = 0;

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Day Sales</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>Order ID: {$row['oid']}, Cost: {$row['cost']}</p>";
            $total_sales += $row['cost'];
        }
        echo "<p>Total Sales: $total_sales</p>";
    } else {
        echo "No sales for the day.";
    }
    ?>

</body>
</html>
