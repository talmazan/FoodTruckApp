<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
</head>
<body>
    <h2>Inventory Management</h2>
    <nav>
        <ul>
            <li><a href="findex.php">Home</a></li>
            <li><a href="open_orders.php">Open</a></li>
            <li><a href="ready_orders.php">Ready</a></li>
            <li><a href="day_sales.php">Day Sales</a></li>
        </ul>
    </nav>
    <?php
    include_once 'ddb_connection.php';

    // Handle form submission to add new item
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_item'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $qty = $_POST['qty'];

        $query = "INSERT INTO item (name, description, qty) VALUES ('$name', '$description', $qty)";
        mysqli_query($connection, $query);
        header("Location: inventory.php");
        exit;
    }

    // Handle form submission to update item
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_item'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $qty = $_POST['qty'];

        $query = "UPDATE item SET description = '$description', qty = $qty WHERE name = '$name'";
        mysqli_query($connection, $query);
        header("Location: inventory.php");
        exit;
    }
    ?>

    
        <h2>Add New Item</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Item Name:</label>
            <input type="text" name="name" required><br><br>
            <label for="description">Description:</label>
            <input type="text" name="description" required><br><br>
            <label for="qty">Quantity:</label>
            <input type="number" name="qty" required><br><br>
            <input type="submit" name="add_item" value="Add Item">
        </form>

        <h2>Update Item</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Item Name:</label>
            <input type="text" name="name" required><br><br>
            <label for="description">Description:</label>
            <input type="text" name="description" required><br><br>
            <label for="qty">Quantity:</label>
            <input type="number" name="qty" required><br><br>
            <input type="submit" name="update_item" value="Update Item">
        </form>
</body>
</html>
