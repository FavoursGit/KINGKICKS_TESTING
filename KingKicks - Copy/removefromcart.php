<?php
include 'classes.php';
session_start();


// Check if product ID and size are provided
if (!isset($_POST['product_id']) || !isset($_POST['size'])) {
    header("Location: cart.php?error=missing_data");
    exit();
}

$product_id = $_POST['product_id'];
$size = $_POST['size'];

// Check if the cart exists
if (!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof Cart)) {
    header("Location: cart.php?error=cart_not_found");
    exit();
}

$cart = $_SESSION['cart'];
$cart->removeProduct($product_id, $size);

// Save the updated cart back to the session
$_SESSION['cart'] = $cart;

// Redirect back to the cart page
header("Location: cart.php");
exit();