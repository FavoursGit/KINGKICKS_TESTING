<?php
include 'classes.php';
session_start();


// Simulate payment processing (you can add real payment logic here)
if (!isset($_POST['card_number']) || !isset($_POST['expiry_date']) || !isset($_POST['cvv'])) {
    header("Location: payment.php?error=missing_data");
    exit();
}

// Clear the cart after successful payment
if (isset($_SESSION['cart']) && $_SESSION['cart'] instanceof Cart) {
    $_SESSION['cart']->clear();
    unset($_SESSION['cart']);
}

// Redirect to the Thank You page
header("Location: thank.php");
exit();