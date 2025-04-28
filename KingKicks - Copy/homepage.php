<?php
session_start(); // Start the session at the top of the file

include 'C:\laragon\www\KingKicks\DBconfig.php'; // Include database connection
include 'C:\laragon\www\KingKicks\classes.php'; // Include classes
// Fetch recently searched products
$all_products = products::getAllProducts(); // Use the static method to get products

$recent_products = array_slice($all_products, 0, 4); // First 4 products
$trending_products = array_slice($all_products, 4, 4); // Next 4 products
// Check if the cart exists and is valid
if (isset($_SESSION['cart']) && $_SESSION['cart'] instanceof Cart) {
    $cart_count = count($_SESSION['cart']->getProducts());
} else {
    $cart_count = 0; // Default to 0 if the cart is not valid
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks</title>
    <link rel="stylesheet" href="css/home.css">
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<?php require_once "template\header.php";?>

    <body>
    <h2>Recently Searched Products</h2>
    <section class="recently">
        <?php foreach ($recent_products as $products): ?>
            <div class="product-box">
                <a href="shoe.php?id=<?php echo $products->getProductId(); ?>">
                    <img src="/KingKicks/images/<?php echo $products->getImage(); ?>" alt="<?php echo $products->getProductName(); ?>">
                </a>
                <div class="price">€<?php echo $products->getPrice(); ?></div>
            </div>
        <?php endforeach; ?>
    </section>
    <h2>Trending Products</h2>
    <section class="trending">
    <?php foreach ($trending_products as $products): ?>
            <div class="product-box">
                <a href="shoe.php?id=<?php echo $products->getProductId(); ?>">
                    <img src="images/<?php echo $products->getImage(); ?>" alt="<?php echo $products->getProductName(); ?>">
                </a>
                <div class="price">€<?php echo $products->getPrice(); ?></div>
            </div>
        <?php endforeach; ?>
    </section>
    <?php require_once 'template\footer.php';?>
</body>
</html>