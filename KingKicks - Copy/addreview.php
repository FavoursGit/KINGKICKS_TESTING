<?php
include 'DBconfig.php';
include 'classes.php';
session_start();


if (!isset($_POST['product_id'], $_POST['rating'], $_POST['comment'])) {
    header("Location: shoe.php?id=" . $_POST['product_id'] . "&error=missing_data");
    exit();
}

$PRODUCT_ID = $_POST['product_id'];
$RATING = (int)$_POST['rating'];
$COMMENT = $_POST['comment'];

if ($RATING < 1 || $RATING > 5) {
    header("Location: shoe.php?id=$PRODUCT_ID&error=invalid_rating");
    exit();
}

Review::addReview($PRODUCT_ID, $RATING, $COMMENT);

header("Location: shoe.php?id=$PRODUCT_ID&success=review_added");
exit();