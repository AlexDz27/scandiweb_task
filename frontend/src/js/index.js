const products = document.querySelectorAll('#product');

products.forEach((product) => {
  product.addEventListener('click', () => {
    const checkbox = product.querySelector('#checkbox');
    checkbox.checked = !checkbox.checked;
  })
});