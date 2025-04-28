<?php
include 'classes.php';
session_start();


// Retrieve the cart from the session
if (!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof Cart)) {
    echo "<p>Your cart is empty. Please add items to your cart before proceeding to checkout.</p>";
    exit();
}

$cart = $_SESSION['cart'];
$items = $cart->getItems();
$total_price = $cart->getTotalPrice();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/shoe.css">
</head>
<body>
<?php include 'template/header.php'; ?>

    <h1>Checkout</h1>
    <p>Total Price: €<?php echo $total_price; ?></p>
    <p>Thank you for shopping with us! Proceed to payment.</p>

    <!-- Add a button to simulate payment -->
    <form action="payment.php" method="POST">
        <button type="submit" style="padding: 10px 20px; font-size: 16px;">Proceed to Payment</button>
    </form>
</body>
</html>