import {ProductsWatcher} from "./modules/ProductsWatcher";

const products = document.querySelectorAll('#product');

const productsWatcher = new ProductsWatcher();
productsWatcher.watch(products);

const deleteBtn = document.querySelector('#deleteBtn');
deleteBtn.addEventListener('click', productsWatcher.deleteSelected.bind(productsWatcher));