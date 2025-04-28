<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>King Kicks </title>
        <link rel="stylesheet" href="css/home.css">
        <script src ="js/home.js">
        </script>
    </head>
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
    <body>
      <h2>Recently Searched Products</h2>>
      <section class="recently">
        <div class="product-box">
            <img src="images/basket.png" alt="Image 1">
            <div class="price">$50</div>
        </div>
        <div class="product-box">
            <img src="images/basket.png" alt="Image 2">
            <div class="price">$60</div>
        </div>
        <div class="product-box">
            <img src="images/basket.png" alt="Image 3">
            <div class="price">$70</div>
        </div>
        <div class="product-box">
            <img src="images/basket.png" alt="Image 4">
            <div class="price">$80</div>
        </div>
    </section>

    <h2>Trending Right Now</h2>
      <section class="trending">
        <div class="product-box">
            <img src="images/basket.png" alt="Image 1">
            <div class="price">$50</div>
        </div>
        <div class="product-box">
            <img src="images/basket.png" alt="Image 2">
            <div class="price">$60</div>
        </div>
        <div class="product-box">
            <img src="images/basket.png" alt="Image 3">
            <div class="price">$70</div>
        </div>
        <div class="product-box">
            <img src="images/basket.png" alt="Image 4">
            <div class="price">$80</div>


      </section>  
    
    </body>
      <footer>

      </footer>
</html>
    
     
    
   
    