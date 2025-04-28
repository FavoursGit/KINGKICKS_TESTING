function selectSize(button) {
    // Remove the 'selected' class from all size buttons
    const sizeButtons = document.querySelectorAll('.size-button');
    sizeButtons.forEach(btn => btn.classList.remove('selected'));

    // Add the 'selected' class to the clicked button
    button.classList.add('selected');

    // Update the hidden input with the selected size
    const selectedSizeInput = document.getElementById('selected-size');
    selectedSizeInput.value = button.getAttribute('data-size');

    // Enable the "Add to Cart" button
    const addToCartButton = document.getElementById('add-to-cart');
    addToCartButton.disabled = false;

    // Debugging: Log the selected size
    console.log("Selected size:", selectedSizeInput.value);
}