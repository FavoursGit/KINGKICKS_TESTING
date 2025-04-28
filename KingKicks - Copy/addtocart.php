<?php
include 'DBconfig.php';
include 'classes.php';
session_start();

// Check if product ID and size are provided
if (!isset($_POST['product_id']) || !isset($_POST['size'])) {
    header("Location: shoe.php?error=missing_data");
    exit();
}

$PRODUCT_ID = $_POST['product_id'];
$SIZE = $_POST['size'];

try {
    // Fetch the product using the Shoe class
    $product = Shoe::getShoeById($PRODUCT_ID);

    if (!$product) {
        header("Location: shoe.php?error=product_not_found");
        exit();
    }

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof Cart)) {
        $_SESSION['cart'] = new Cart();
    }

    // Retrieve the cart from the session
    $cart = $_SESSION['cart'];

    // Add the product to the cart
    $quantity = 1; // Default quantity
    $cart->addProduct($product, $quantity, $SIZE);

    // Save the updated cart back to the session
    $_SESSION['cart'] = $cart;

    // Redirect to the cart page
    header("Location: cart.php");
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}