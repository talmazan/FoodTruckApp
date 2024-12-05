<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>
    <h2>Order Form</h2>
    <form action="process_order.php" method="post">
        <label for="item">Select Item:</label>
        <select name="item" id="item">
            <?php
            // Include database connection file
            include_once 'ddb_connection.php';

            // Fetch items from the item table
            $query = "SELECT iid, name FROM item";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['iid']}'>{$row['name']}</option>";
                }
            } else {
                echo "<option>No items available</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="cname">Your Name:</label>
        <input type="text" name="cname" id="cname" required>
        <br><br>
        <label for="location">Select Location:</label>
        <select name="location" id="location">
            <?php
            // Fetch locations from the location table
            $query = "SELECT lid, lname FROM location";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['lid']}'>{$row['lname']}</option>";
                }
            } else {
                echo "<option>No locations available</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="qty">Quantity:</label>
        <input type="number" name="qty" id="qty" min="1" required>
        <br><br>
        <input type="submit" value="Place Order">
    </form>
</body>
</html>
