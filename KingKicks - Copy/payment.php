<?php
include 'classes.php';
session_start();


// Retrieve the cart from the session
if (!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof Cart)) {
    echo "<p>Your cart is empty. Please add items to your cart before proceeding to payment.</p>";
    exit();
}

$cart = $_SESSION['cart'];
$total_price = $cart->getTotalPrice();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/shoe.css">
</head>
<body>
<?php include 'template/header.php'; ?>

    <h1>Payment</h1>
    <p>Total Price: €<?php echo $total_price; ?></p>

    <form action="payment_success.php" method="POST">
        <label for="card_number">Card Number:</label><br>
        <input type="text" id="card_number" name="card_number" placeholder="Enter your card number" required><br><br>

        <label for="expiry_date">Expiry Date:</label><br>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required><br><br>

        <label for="cvv">CVV:</label><br>
        <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required><br><br>

        <form action="payment_success.php" method="POST">
        <button type="submit" style="padding: 10px 20px; font-size: 16px;">Confirm Payment</button>
        </form>
</body>
</html>