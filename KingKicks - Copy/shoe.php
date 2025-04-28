<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'DBconfig.php';
include 'classes.php';

// Get the product ID from the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $PRODUCT_ID = $_GET['id'];

    // Fetch product details from the database
    $product = Shoe::getShoeById($PRODUCT_ID);
    //Fetch review details
    $reviews = Review::getReviewsByProductId($PRODUCT_ID);

    if (!$product) {
        echo "<p>Debug: Product not found for ID $PRODUCT_ID.</p>";
        require_once 'template/footer.php';
        exit;
    } else {
        echo "<p>Debug: Product found: " . htmlspecialchars($product->getProductName()) . "</p>";
    }

    // Fetch sizes for the product
    $SIZE = $product->getSize();
    //echo "<pre>";
    //print_r($SIZE); // Debugging output for sizes
    // echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product->getProductName()); ?> - King Kicks</title>
    <link rel="stylesheet" href="css/shoe.css">
    <script src="js/size.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<?php require_once "template/header.php";?>
<body>
<div class="shoe">
        <div class="image">
            <img src="images/<?php echo htmlspecialchars($product->getImage()); ?>" alt="<?php echo htmlspecialchars($product->getProductName()); ?>">
        </div>  
        <h2>Price: €<?php echo htmlspecialchars($product->getPrice()); ?></h2>
        <p class="stock">
                <?php if ($product->getStock() > 0): ?>
                    ✅ Currently in stock
                <?php else: ?>
                    ❌ Out of stock
                <?php endif; ?>
            </p>
        </div>
    </div>
    <div class="size">
        <h2>Size</h2>
        <?php foreach ($SIZE as $size): ?>
            <button 
                class="size-button" 
                data-size="<?php echo htmlspecialchars($size['SIZE']); ?>" 
                <?php echo $size['stock'] == 0 ? 'disabled' : ''; ?>
                onclick="selectSize(this)"
            >   
                <?php echo htmlspecialchars($size['SIZE']); ?>
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
<div class="reviews-list">
    <h2>Customer Reviews</h2>
    <?php if (empty($reviews)): ?>
        <p>No reviews yet. Be the first to review this product!</p>
    <?php else: ?>
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <p><strong>Rating:</strong> <?php echo htmlspecialchars($review->getRating() ?? 'N/A'); ?>/5</p>
                <p><strong>Comment:</strong> <?php echo htmlspecialchars($review->getComment() ?? 'No comment provided'); ?></p>
                <p><em>Reviewed on <?php echo htmlspecialchars($review->getCreatedAt() ?? 'Unknown date'); ?></em></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="add-review">
    <h2>Leave a Review</h2>
    <form action="addreview.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $PRODUCT_ID; ?>">
        
        <label for="rating">Rating (1-5):</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Write your review here..." required></textarea><br><br>

        <button type="submit" style="padding: 10px 20px; font-size: 16px;">Submit Review</button>
    </form>
</div>

        <?php require_once 'template/footer.php';?>
</body>
</html>