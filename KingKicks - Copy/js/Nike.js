// Get the slider and output elements
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value and filter products
slider.oninput = function () {
    output.innerHTML = this.value; // Update the displayed slider value

    // Get all products in the MainContent section
    var products = document.querySelectorAll(".product-box");

    // Loop through products and hide/show based on price
    products.forEach(function (product) {
        var productPrice = parseInt(product.getAttribute("data-price")); // Get product price
        if (productPrice <= slider.value) {
            product.style.display = "block"; // Show product
        } else {
            product.style.display = "none"; // Hide product
        }
    });
};