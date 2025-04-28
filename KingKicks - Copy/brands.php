<?php
session_start();
?>
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
                    <a href="brands.html">Brands</a>
                    <div class="dropdown-content">
                        <a href="Nike.php">Nike</a>
                        <a href="Jordan.php">Jordan</a>
                        <a href="NewBalance">New Balance</a>
                        <a href="Yeezys.php">Yeezys</a>
                    </div>
                </li>
                </li>
                <li><a href="all.php">Shop All</a></li>
                <li><a href="new.php">New</a></li>
                <li><a href="Sale.php">Sale</a></li>
                <li><input type="text" placeholder="Search"></li>
                <li><a href="signup.php"><img src="images/login.png" width="50" height="50"></a></li>
                <li><img src="images/cart.png" width="50" height="50"></li>
            </ul>
        </section> 
    </header>
    <body>
    <h2>Nike Shoes</h2>
    <section class="nshoerow1">
        <div class="product-box">
            <a href="shoe1.php"><img src="images/shoes1-Photoroom.png" alt="Image 1"></a>
            <div class="price">€135</div>
        </div>
        <div class="product-box">
            <a href="shoe2.php"><img src="images/shoes2-Photoroom.png" alt="Image 2">
            <div class="price">€115</div>
        </div>
        <div class="product-box">
            <a href="shoe3.php"><img src="images/shoes3-Photoroom.png" alt="Image 3">
            <div class="price">€115</div>
        </div>
        <div class="product-box">
            <a href="shoe4.php"><img src="images/shoes4-Photoroom.png" alt="Image 4">
            <div class="price">€399</div>
        </div>
    </section>
    <section class = "nshoerow2">    
        <div class="product-box">
            <a href="shoe5.php"><img src="images/shoes5-Photoroom.png" alt="Image 1">
            <div class="price">€899</div>
        </div>
        <div class="product-box">
            <a href="shoe6.php"><img src="images/shoes6-Photoroom.png" alt="Image 2">
            <div class="price">€210</div>
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
      <h2>Yeezys</h2>
    <section class="yshoerow1">
        <div class="product-box">
            <a href="yshoe1.php"><img src="images/yshoes1-Photoroom.png" alt="Image 1"></a>
            <div class="price">€220</div>
        </div>
        <div class="product-box">
            <a href="yshoe2.php"><img src="images/yshoes2-Photoroom.png" alt="Image 2">
            <div class="price">€150</div>
        </div>
        <div class="product-box">
            <a href="yshoe3.php"><img src="images/yshoes3-Photoroom.png" alt="Image 3">
            <div class="price">€200</div>
        </div>
        <div class="product-box">
            <a href="yshoe4.php"><img src="images/yshoes4-Photoroom.png" alt="Image 4">
            <div class="price">€80</div>
        </div>
    </section>
    <section class="yshoerow2">
        <div class="product-box">
            <a href="yshoe5.php"><img src="images/yshoes5-Photoroom.png" alt="Image 1">
            <div class="price">€350</div>
        </div>
        <div class="product-box">
            <a href="yshoe6.php"><img src="images/yshoes6-Photoroom.png" alt="Image 2">
            <div class="price">€100</div>
        </div>
        <div class="product-box">
            <a href="yshoe7.php"><img src="images/yshoes7-Photoroom.png" alt="Image 3">
            <div class="price">€55</div>
        </div>
        <div class="product-box">
            <a href="yshoe8.php"><img src="images/yshoes8-Photoroom.png" alt="Image 4">
            <div class="price">€75</div>
        </div>
      </section>
    
    </body>
      <footer>

      </footer>
</html>
    