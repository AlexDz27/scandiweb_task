export class ProductsWatcher {
  constructor() {
    this.products = null;
    this.selectedProducts = [];
  }
  
  watch(products) {
    this.products = products;
    this.products.forEach(product => product.addEventListener('click', this.handleProductToggle.bind(this, product)));
  }

  deleteSelected() {
    this.selectedProducts.forEach((product) => {
      product.parentNode.removeChild(product);
    });
    
    this.selectedProducts = [];
  }
  
  handleProductToggle(product) {
    const checkbox = product.querySelector('#checkbox');

    const handleSelect = (product) => {
      checkbox.checked = true;

      this.selectedProducts.push(product);
    }

    const handleDeselect = (product) => {
      checkbox.checked = false;

      this.selectedProducts = this.selectedProducts.filter((selectedProduct) => {
        return selectedProduct.dataset.listId !== product.dataset.listId;
      });
    }

    if (!checkbox.checked) {
      handleSelect(product);
    } else {
      handleDeselect(product);
    }
  }
}