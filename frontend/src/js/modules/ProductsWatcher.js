export class ProductsWatcher {
  constructor() {
    this.products = [];
    this.selectedProducts = [];
  }
  
  watch(products) {
    this.products = products;
    this.products.forEach(product => product.addEventListener('click', this.handleProductToggle.bind(this, product)));
  }

  deleteSelected() {
    document.body.style.cursor = 'progress';

    const ids = this.selectedProducts.map(product => product.dataset.listId);

    this.helpers.sendDeleteProductsRequest(ids)
      .then((response) => {
        if (!response.ok) {
          console.error('Error sending delete products request.');
          return;
        }

        this.selectedProducts.forEach(product => product.remove());
        this.selectedProducts = [];

        document.body.style.cursor = 'default';
      });
  }
  
  handleProductToggle(product) {
    if (!this.selectedProducts.includes(product)) {
      this.helpers.handleSelect(product);
    } else {
      this.helpers.handleDeselect(product);
    }
  }

  get helpers() {
    // Products frontend interaction
    const handleSelect = (product) => {
      product.querySelector('#checkbox').checked = true;

      this.selectedProducts.push(product);
    }

    const handleDeselect = (product) => {
      product.querySelector('#checkbox').checked = false;

      this.selectedProducts = this.selectedProducts.filter((selectedProduct) => {
        return selectedProduct.dataset.listId !== product.dataset.listId;
      });
    }

    // Products backend interaction
    const sendDeleteProductsRequest = (ids) => {
      return fetch('http://scandiweb.local/product/delete', {
        method: 'DELETE',
        body: JSON.stringify(ids)
      });
    }

    return {
      handleSelect: handleSelect.bind(this),
      handleDeselect: handleDeselect.bind(this),

      sendDeleteProductsRequest: sendDeleteProductsRequest.bind(this)
    }
  }
}