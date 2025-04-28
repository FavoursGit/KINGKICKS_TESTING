<?php
session_start();
include 'DBconfig.php';
include 'classes.php';
// Fetch product details from the database
$product_id = 4; // Replace with dynamic ID if needed
$sql = "SELECT * FROM products WHERE PRODUCT_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    // Create a Product object
    $product = new Product($row['PRODUCT_ID'], $row['PRODUCT_NAME'], $row['PRICE'], $row['BRAND'], $row['STOCK'], $row['image']);
    $product->fetchSizes($conn); // Fetch sizes for the product
} else {
    die("Product not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks</title>
    <link rel="stylesheet" href="css/shoe.css">
    <script src="js/handlesize.js?v=<?php echo time(); ?>"></script>
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
    <div class="shoe">
        <div class="image">
            <img src="images/shoes4-Photoroom.png" alt="Jordan 4 Retro Thunder">
        </div>
        <div class="description">
        <h2><?php echo $product->getName(); ?></h2>
        <h2>Price: €<?php echo $product->getPrice(); ?></h2>
            <p>The Air Jordan 4 Retro Thunder is a bold sneaker known for its black and yellow nubuck upper,
                mesh panels, and supportive wings. Originally designed by Tinker Hatfield, 
                it features visible Air cushioning and a herringbone outsole for great traction. 
                First released in 2006 and re-released in 2012 and 2023, this classic remains 
                a favorite among sneaker fans for its iconic design and comfort.
            </p>
            <p class="stock">✅ Currently in stock</p>
        </div>
    </div>
    <div class="size">
    <h2>Size</h2>
    <?php foreach ($product->getSizes() as $size): ?>
        <button 
            class="size-button" 
            data-size="<?php echo $size['size']; ?>" 
            <?php echo $size['stock'] == 0 ? 'disabled' : ''; ?>
            onclick="selectSize(this)"
        >
            <?php echo $size['size']; ?>
            <?php if ($size['stock'] == 0): ?>
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
    <h2>Customers Also Liked..</h2>
    <section class="trending">
        <div class="product-box">
            <img src="images/shoes5-Photoroom.png" alt="Image 1">
            <div class="price">€899</div>
        </div>
        <div class="product-box">
            <img src="images/shoes6-Photoroom.png" alt="Image 2">
            <div class="price">€210</div>
        </div>
        <div class="product-box">
            <img src="images/shoes7-Photoroom.png" alt="Image 3">
            <div class="price">€115</div>
        </div>
        <div class="product-box">
            <img src="images/shoes8-Photoroom.png" alt="Image 4">
            <div class="price">€1,729</div>
        </div>
    </section>
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