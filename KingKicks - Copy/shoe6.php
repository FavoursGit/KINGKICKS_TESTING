<?php
session_start();
include 'DBconfig.php';
include 'classes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks</title>
    <link rel="stylesheet" href="css/shoe.css">
    <script src="js/home.js"></script>
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
        </section><
    <div class="shoe">
        <div class="image">
            <img src="images/shoes6-Photoroom.png" alt="Air Jordan IV  Retro “Black Cat">
        </div>
        <div class="description">
            <h2>Nike SB Dunk Low “Dodgers”</h2>    
            <h2>€210</h2>
            <p>//new descrition needed nathan/This year, the no-fuss “Black Cat” Jordan IV was treated to a retro release for the first time ever,
                which is kind of a big deal. This murdered out Jordan IV first released in 2006, 
                and the name “Black Cat” derived from one of Jordan’s nicknames. Nubuck leather is complemented by graphite matte finishes, 
                while Jumpman logos on the tongue and heel blend in seamlessly with the stealthy colour scheme.
               These are a cheat code. What else is there to say?
            </p>
            <p class="stock">✅ Currently in stock</p>
        </div>
    </div>
    <div class="size">
        <h2>Size</h2>
        <button>6</button>
        <button>7</button>
        <button>8</button>
        <button>9</button>
        <button>10</button>
        <button>11</button>
        <button>12</button>
    </div>
    <div class="add">
        <button>Add to Cart</button>
    </div>
    <h2>Customers Also Liked..</h2>
    <section class="trending">
        <div class="product-box">
            <a href="shoe4.php"><img src="images/shoes4-Photoroom.png" alt="Image 1">
            <div class="price">€399</div>
        </div>
        <div class="product-box">
            <a href="shoe3.php"><img src="images/shoes3-Photoroom.png" alt="Image 2">
            <div class="price">€115</div>
        </div>
        <div class="product-box">
            <a href="shoe7.php"><img src="images/shoes7-Photoroom.png" alt="Image 3">
            <div class="price">€115</div>
        </div>
        <div class="product-box">
            <a href="shoe8.php"><img src="images/shoes8-Photoroom.png" alt="Image 4">
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