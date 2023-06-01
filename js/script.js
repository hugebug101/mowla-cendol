function openCartSlideOver() {
  const cartSlideOver = document.getElementById("cartSlideOver");
  cartSlideOver.classList.add("show");
}

function closeCartSlideOver() {
  const cartSlideOver = document.getElementById("cartSlideOver");
  cartSlideOver.classList.remove("show");
}

function increaseQuantity(input) {
  let quantityInput = input.previousElementSibling;
  quantityInput.stepUp();
}

function decreaseQuantity(element) {
  const inputElement = element.nextElementSibling;
  let quantity = parseInt(inputElement.value);

  if (quantity > 1) {
    quantity--;
  } else {
    quantity = 1;
  }

  inputElement.value = quantity;
}
