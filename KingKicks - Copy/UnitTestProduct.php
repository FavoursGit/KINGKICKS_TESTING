<?php
use PHPUnit\Framework\TestCase;
require_once 'product.php'; // Include the product class

class UnitTestProduct extends TestCase {

    public function testProductCreation() {
        $product = new product();

        $product->setproductID(1);
        $product->setproductName("Nike Air Max 90");
        $product->setBrand("Nike");
        $product->setPrice(135);
        $product->setamountordered(5);
        $product->setStock(10);
        $product->setimage("shoe1-Photoroom.png");

        // Assertions to verify the values
        $this->assertEquals(1, $product->getproductID());
        $this->assertEquals("Nike Air Max 90", $product->getproductName());
        $this->assertEquals("Nike", $product->getBrand());
        $this->assertEquals(135, $product->getPrice());
        $this->assertEquals(5, $product->getamountordered());
        $this->assertEquals(10, $product->getStock());
        $this->assertEquals("shoe1-Photoroom.png", $product->getimage());
    }

    public function testSetAndGetMethods() {
        $product = new product();

        $product->setproductID(2);
        $this->assertEquals(2, $product->getproductID());

        $product->setproductName("Nike Air Max 95");
        $this->assertEquals("Nike Air Max 95", $product->getproductName());

        $product->setBrand("Nike");
        $this->assertEquals("Nike", $product->getBrand());

        $product->setPrice(115);
        $this->assertEquals(115, $product->getPrice());

        $product->setamountordered(3);
        $this->assertEquals(3, $product->getamountordered());

        $product->setStock(8);
        $this->assertEquals(8, $product->getStock());

        $product->setimage("shoe2-Photoroom.png");
        $this->assertEquals("shoe2-Photoroom.png", $product->getimage());
    }
}
?>