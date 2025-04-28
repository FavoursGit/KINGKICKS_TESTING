<?php
session_start();
include 'DBconfig.php';
include 'classes.php';

// Fetch product details from the database
$product_id = 1; // Product ID for Shoe 1
$sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRICE, BRAND, IMAGE FROM products WHERE PRODUCT_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    // Create a Product object
    $product = new Product(
        $row['PRODUCT_ID'],
        $row['PRODUCT_NAME'],
        $row['PRICE'],
        $row['BRAND'],
        null, // Stock is not fetched here
        $row['IMAGE']
    );
} else {
    die("Product not found.");
}

// Fetch sizes and stock for the product
$sizes = [];
$sql_sizes = "SELECT size, stock FROM shoe_sizes WHERE product_id = ?";
$stmt_sizes = $conn->prepare($sql_sizes);
$stmt_sizes->bind_param("i", $product_id);
$stmt_sizes->execute();
$result_sizes = $stmt_sizes->get_result();

while ($size_row = $result_sizes->fetch_assoc()) {
    $sizes[$size_row['size']] = $size_row['stock'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks - Shoe 1</title>
    <link rel="stylesheet" href="css/shoe.css">
    <script src="js/handlesize.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header>
    <section class="nav">
        <ul>
            <li><a href="homepage.php"><img src="images/White_KingKicks.png" width="60" height="50"></a></li>
            <li class="dropdown">
                <a href="brands.php">Brands</a>
                <div class="dropdown-content">
                    <a href="Nike.php">Nike</a>
                    <a href="Jordan.php">Jordan</a>
                    <a href="NewBalance.php">New Balance</a>
                    <a href="Yeezys.php">Yeezys</a>
                </div>
            </li>
            <li><a href="all.php">Shop All</a></li>
            <li><a href="new.php">New</a></li>
            <li><a href="sale.php">Sale</a></li>
            <li><input type="text" placeholder="Search"></li>
            <li>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="profile.php">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    <a href="logout.php" class="logout-button">Logout</a>
                <?php else: ?>
                    <a href="login.php"><img src="images/login.png" width="50" height="50"></a>
                <?php endif; ?>
            </li>
            <li><a href="cart.php"><img src="images/cart.png" width="50" height="50" alt="Cart"></a></li>
        </ul>
    </section>
</header>
<div class="shoe">
    <div class="image">
        <img src="images/<?php echo htmlspecialchars($product->getImage()); ?>" alt="<?php echo htmlspecialchars($product->getName()); ?>">
    </div>
    <div class="description">
        <h2><?php echo htmlspecialchars($product->getName()); ?></h2>
        <h2>Price: €<?php echo htmlspecialchars($product->getPrice()); ?></h2>
        <p>Nike Air Max 1 is a timeless classic that revolutionized the sneaker industry with its visible Air cushioning. Known for its comfort and style, it remains a favorite among sneaker enthusiasts worldwide.</p>
        <p class="stock">✅ Currently in stock</p>
    </div>
</div>
<div class="size">
    <h2>Size</h2>
    <?php foreach ($sizes as $size => $stock): ?>
        <button 
            class="size-button" 
            data-size="<?php echo htmlspecialchars($size); ?>" 
            <?php echo $stock == 0 ? 'disabled' : ''; ?>
            onclick="selectSize(this)"
        >   
            <?php echo htmlspecialchars($size); ?>
            <?php if ($stock == 0): ?>
                (Out of Stock)
            <?php endif; ?>
        </button>
    <?php endforeach; ?>
</div>
<div class="add">
    <form action="addtocart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product->getProductId(); ?>">
        <input type="hidden" id="selected-size" name="size" value=""> <!-- Hidden input for size -->
        <button type="submit" id="add-to-cart" disabled>Add to Cart</button>
    </form>
</div>
<footer>
    <div class="footer-content">
        <ul>
            <h3>Contact Us</h3>
            <p>Email: KingKicks@Gmail.com</p>
            <p>Phone: 123-456-7890</p>
            <p>Address: 123 KingKicks Lane</p>
        </ul>
    </div>
    <div class="footer-content">
        <ul>
            <h3>Founders</h3>
            <p>Favour Godson</p>
            <p>Luke Douglas</p>
            <p>Nathan Lynch</p>
        </ul>
    </div>
    <div class="footer-content">
        <ul>
            <h3>Follow Us</h3>
            <li class="social-icons">
                <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
            </li>
        </ul>
    </div>
</footer>
</body>
</html>