<?php
session_start();
include 'C:\laragon\www\KingKicks\DBconfig.php'; // Include database connection
include 'C:\laragon\www\KingKicks\classes.php'; // Include the Product class

// Fetch Nike products
$nikeProducts = fetchNikeProducts($conn);

// Fetch Nike products from the database
function fetchNikeProducts($conn) {
    $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRICE, BRAND, STOCK, IMAGE FROM products WHERE brand = 'Nike'";
    $result = $conn->query($sql);

    $products = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Create a Product object for each row
            $product = new Product(
                $row['PRODUCT_ID'],
                $row['PRODUCT_NAME'],
                $row['PRICE'],
                $row['BRAND'],
                $row['STOCK'],
                $row['IMAGE']
            );
            $products[] = $product; // Add the Product object to the array
        }
    }
    return $products;
}

$minPrice = min(array_map(fn($product) => $product->getPrice(), $nikeProducts));
$maxPrice = max(array_map(fn($product) => $product->getPrice(), $nikeProducts));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks</title>
    <link rel="stylesheet" href="css/Nike.css">
    <script src="js/Nike.js"></script>
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

<aside class="ProductSideBar">
    <h3>Nike</h3>
    <p>Nike is a global leader in athletic footwear, apparel, and equipment, known for innovation and performance.</p>
    <h3>Filter Shoes</h3>
    <label for="color">Color:</label>
    <select id="color">
        <option value="black">Black</option>
        <option value="white">White</option>
        <option value="red">Red</option>
    </select>
    <div class="slider-container">
    <label for="priceRange">Filter by Price: €<span id="demo"></span></label>
    <input type="range" id="myRange" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" step="10" value="<?php echo $maxPrice; ?>">
</div>
</aside>

<div class="MainContent">
    <section class="trending">
        <?php if (empty($nikeProducts)): ?>
            <p>No Nike products available at the moment.</p>
        <?php else: ?>
            <?php foreach ($nikeProducts as $product): ?>
                <div class="product-box" data-price="<?php echo $product->getPrice(); ?>">
                    <a href="Shoe<?php echo $product->getProductId(); ?>.php">
                        <img src="images/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getName(); ?>">
                    </a>
                    <h3><?php echo $product->getName(); ?></h3>
                    <div class="price">€<?php echo number_format($product->getPrice()); ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
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