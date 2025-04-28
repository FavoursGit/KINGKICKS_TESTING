<?php
include 'DBconfig.php';
include 'classes.php';
session_start();


// Retrieve the cart from the session
if (!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof Cart)) {
    echo "<p>Your cart is empty.</p>";
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
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include 'template/header.php'; ?>

    <h1>Your Cart</h1>
    <?php if (empty($items)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $key => $item): ?>
                    <tr>
                    <td><img src="images/<?php echo htmlspecialchars($item['product']->getImage()); ?>" alt="<?php echo htmlspecialchars($item['product']->getProductName()); ?>" style="width: 100px; height: auto;"></td>
                        <td><?php echo htmlspecialchars($item['product']->getProductName()); ?></td>
                        <td><?php echo htmlspecialchars($item['size']); ?></td>
                        <td>€<?php echo htmlspecialchars($item['product']->getPrice()); ?></td>
                        <td>€<?php echo htmlspecialchars($item['product']->getPrice() * $item['quantity']); ?></td>
                        <td>
                            <form action="removefromcart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $item['product']->getProductId(); ?>">
                                <input type="hidden" name="size" value="<?php echo $item['size']; ?>">
                                <button type="submit">Remove</button>
                            </form>
                         </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Total Price: €<?php echo $total_price; ?></h2>
        
        <form action="checkout.php" method="GET">
        <button type="submit" style="margin-top: 20px; padding: 10px 20px; font-size: 16px;">Buy</button>
    </form>
    <?php endif; ?>
</body>
</html>