<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="css/shoe.css">
</head>
<body>
<?php include 'template/header.php'; ?>

    <h1>Thank You for Your Purchase!</h1>
    <p>Your order has been successfully placed. We appreciate your business!</p>
    <a href="homepage.php" style="padding: 10px 20px; font-size: 16px; text-decoration: none; background-color: #4CAF50; color: white; border-radius: 5px;">Return to Homepage</a>
</body>
</html>