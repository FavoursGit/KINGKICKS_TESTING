<?php
class product{
    //CHANGE TO PRIVATE LATER
    public $productID;
    public $productName;
    public $Brand;
    public $Price;
    public $amountordered;
    public $Stock;
    public $image;



    //Access Modifier
    public function setproductID($productID){
        $this->productID = $productID;
    }
    public function getproductID(){
        return $this->productID;
    }
    public function setproductName($productName){
        $this->productName = $productName;
    }
    public function getproductName(){
        return $this->productName;
    }
    public function setBrand($Brand){
        $this->Brand = $Brand;
    }
    public function getBrand(){
        return $this->Brand;
    }
    public function setPrice($Price){
        $this->Price = $Price;
    }
    public function getPrice(){
        return $this->Price;
    }
    public function setamountordered($amountordered){
        $this->amountordered = $amountordered;
    }
    public function getamountordered(){
        return $this->amountordered;
    }
    public function setStock($Stock){
        $this->Stock = $Stock;
    }
    public function getStock(){
        return $this->Stock;
    }
    public function setimage($image){
        $this->image = $image;
    }
    public function getimage(){
        return $this->image;
    }

    //DISPLAY METHOD DECLARATION
    public function display(){
        echo "Product ID: " . $this->getproductID() . "<br>";
        echo "Product Name: " . $this->getproductName() . "<br>";
        echo "Brand: " . $this->getBrand() . "<br>";
        echo "Price: " . $this->getPrice() . "<br>";
        echo "Amount Ordered: " . $this->getamountordered() . "<br>";
        echo "Stock: " . $this->getStock() . "<br>";
        echo "Image: " . $this->getimage() . "<br>";
    }
} //END OF CLASS

// Instantiate the products
$productA = new product();
$productB = new product();

// FIRST PRODUCT
$productA->setproductID(1);
$productA->setproductName("Nike Air Max 90");
$productA->setBrand("Nike");
$productA->setPrice(135);
$productA->setamountordered(0);
$productA->setStock(10);
$productA->setimage("shoe1-Photoroom.png");

// SECOND PRODUCT
$productB->setproductID(2);
$productB->setproductName("Nike Air Max 95");
$productB->setBrand("Nike");
$productB->setPrice(115);
$productB->setamountordered(0);
$productB->setStock(10);

$productA->display();
$productB->display();

?>