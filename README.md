 PHP Inventory and Order Management System

 Project Overview
This repository contains a PHP-based system for managing inventory and processing orders. The system includes functionality for viewing sales data, managing inventory, and processing customer orders.

 Features
- **Day Sales Report (`day_sales.php`)**: Displays daily sales information.
- **Database Connection (`ddb_connection.php`)**: Handles connection to the database.
- **Main Index (`findex.php`)**: The landing page for the application.
- **Inventory Management (`inventory.php`)**: Manages inventory data and updates.
- **Order Ready Marking (`markReady.php`)**: Marks orders as ready for delivery or pickup.
- **Open Orders View (`open_orders.php`)**: Displays all open orders.
- **Order Form (`order_form.php`)**: Allows users to place orders.
- **Order Processing (`process_order.php`)**: Handles the logic for processing submitted orders.
- **Ready Orders View (`ready_orders.php`)**: Displays all completed and ready orders.

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/your-repository.git
   ```
2. Set up a web server environment (e.g., XAMPP, WAMP, or LAMP).
3. Place the project files in the server's `htdocs` or equivalent directory.
4. Import the database using the provided SQL file (if any).

## Usage
1. Ensure the database connection settings in `ddb_connection.php` are correct for your environment.
2. Open the application in a web browser by navigating to `http://localhost/findex.php` or the equivalent URL.
3. Use the provided interfaces to manage inventory, process orders, and view reports.

## Requirements
- PHP 7.4 or higher
- MySQL/MariaDB database
- Apache/Nginx web server

## File Descriptions
- **`day_sales.php`**: Generates reports for daily sales figures.
- **`ddb_connection.php`**: Defines the database connection and credentials.
- **`findex.php`**: Main index page for navigating the application.
- **`inventory.php`**: Manages inventory details and data.
- **`markReady.php`**: Updates order statuses to "ready."
- **`open_orders.php`**: Displays pending orders.
- **`order_form.php`**: User-facing form for creating new orders.
- **`process_order.php`**: Back-end processing for submitted orders.
- **`ready_orders.php`**: Lists orders that are marked as ready.
