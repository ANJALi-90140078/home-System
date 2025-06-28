<?php
session_start();
include '../db/dbconnect.php';

// Ensure database connection is established
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['order'])) {
        
        // Check if user is logged in
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            echo "<script>window.location.href = '../login.php';</script>";
            exit;
        }

        // Ensure customer ID is set
        if (!isset($_SESSION['customer_id']) || empty($_SESSION['customer_id'])) {
            die("Error: Customer ID not found.");
        }
        
        $customer_id = (int) $_SESSION['customer_id'];
        $full_name = mysqli_real_escape_string($conn, trim($_POST['full_name']));
        $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
        $address = mysqli_real_escape_string($conn, trim($_POST['address']));
        $pincode = (int) $_POST['pincode'];
        $pay_mode = mysqli_real_escape_string($conn, trim($_POST['pay_mode']));
        $total = (float) $_POST['total'];
        date_default_timezone_set('Asia/Kolkata');
        $order_date = date('Y-m-d H:i:s');
        $due_date = mysqli_real_escape_string($conn, trim($_POST['due_date']));

        // Validate total price
        if ($total <= 0) {
            die("Error: Invalid total amount.");
        }

        // Prepare the SQL query to insert into order_master
        $masterquery = "INSERT INTO order_master (customer_id, full_name, phone, address, pincode, pay_mode, total, order_date, due_date) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $masterquery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isssissss", $customer_id, $full_name, $phone, $address, $pincode, $pay_mode, $total, $order_date, $due_date);
            if (!mysqli_stmt_execute($stmt)) {
                die("Order Master Insert Error: " . mysqli_error($conn));
            }
            mysqli_stmt_close($stmt);

            // Get the last inserted order ID
            $order_id = mysqli_insert_id($conn);
            if ($order_id <= 0) {
                die("Error: Order ID not generated.");
            }

            // Ensure cart session exists and is not empty
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                die("Error: Cart is empty or not set.");
            }

            // Prepare statement for inserting into user_order
            $query2 = "INSERT INTO user_order (order_id, service_id, sp_id, service_title, price, qty, status) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt2 = mysqli_prepare($conn, $query2);

            if ($stmt2) {
                mysqli_stmt_bind_param($stmt2, "iiissis", $order_id, $service_id, $sp_id, $service_title, $price, $quantity, $status);
                
                foreach ($_SESSION['cart'] as $key => $value) {
                    $service_id = (int) $value['service_id'];
                    $sp_id = (int) $value['sp_id'];
                    $service_title = mysqli_real_escape_string($conn, $value['service_title']);
                    $price = (float) $value['price'];
                    $quantity = (int) $value['quantity'];
                    $status = "pending";
                    
                    if (!mysqli_stmt_execute($stmt2)) {
                        die("User Order Insert Error: " . mysqli_error($conn));
                    }
                }

                mysqli_stmt_close($stmt2);
                unset($_SESSION['cart']); // Clear cart after order placement

                // Redirect to order placed page
                echo "<script>window.location.href='order_placed.php?order_id={$order_id}&customer_id={$customer_id}';</script>";
                exit;
            } else {
                die("User Order Query Failed: " . mysqli_error($conn));
            }
        } else {
            die("Order Master Query Failed: " . mysqli_error($conn));
        }
    }
}
?>
