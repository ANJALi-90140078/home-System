<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        $category_id = $_POST['category_id'];
        if (isset($_SESSION['cart'])) {
            // check whether this item already added or not
            $myservice = array_column($_SESSION['cart'], 'service_title');
            if (in_array($_POST['service_title'], $myservice)) {
                // if any one press add-to-cart button again then quantty upadated
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value['service_title'] == $_POST['service_title']) {
                        $_SESSION['cart'][$key]['quantity'] += 1;
                        $_SESSION['status'] = "Quantity updated";
                        echo "<script>
            window.location.href = 'serviceshow.php?category_id=" . $category_id . "';
            </script>";
                    }
                }
                
            } else {
                // success added
                //count the cart item. it shows how many services added in this cart.
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array(
                    'service_title' => $_POST['service_title'],
                    'service_id' => $_POST['service_id'],
                    'sp_name' => $_POST['sp_name'],
                    'sp_id' => $_POST['sp_id'],
                    'price' => $_POST['price'],
                    'quantity' => 1

                );
                $_SESSION['status'] = "Service successfully added";
                // header("location: serviceshow.php?category_id=' . $category_id . '");
                echo "<script>
                window.location.href = 'serviceshow.php?category_id=" . $category_id . "';
                </script>";
            }
            // print_r($_SESSION['cart']);  

        } else {
            $_SESSION['cart'][0] = array(
                'service_title' => $_POST['service_title'],
                'service_id' => $_POST['service_id'],
                'sp_name' => $_POST['sp_name'],
                'sp_id' => $_POST['sp_id'],
                'price' => $_POST['price'],
                'quantity' => 1
                
            );

            $_SESSION['status'] = "Service successfully added";
            // header("location: serviceshow.php?category_id='.$category_id.'");

            echo "<script>
                window.location.href = 'serviceshow.php?category_id=" . $category_id . "';
                </script>";

            // print_r($_SESSION['cart']);  
        }
    }

    //remove from cart code
    if (isset($_POST['remove_service'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['service_title'] == $_POST['service_title']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); //session ni value rearange krse aa line-code.
                $_SESSION['removesuccess'] = "Service successfully removed.";
                echo '
                <script>
                window.location.href="mycart.php";
                </script>
                ';
            }
        }
    }



    //change quantity code
    if (isset($_POST['Mod_Quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['service_title'] == $_POST['service_title']) {
                $_SESSION['cart'][$key]['quantity'] = $_POST['Mod_Quantity'];
                // print_r($_SESSION['cart']);
                echo '
                    <script>
                        window.location.href="mycart.php";
                    </script>
                ';
            }
        }
    }
}
