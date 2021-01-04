<?php
use App\Models\Products\Description\AbstractProduct;
/** @var AbstractProduct $products */
?>

<header class="header container">
  <div class="header__wrapper">
    <h1>Product List</h1>

    <nav class="nav">
      <a href="#">Add</a>
      <button id="deleteBtn" type="button">Mass Delete</button>
    </nav>
  </div>

  <hr>
</header>

<main class="container">
  <ul class="card-list">
    <?php foreach ($products as $product): ?>
      <li id="product" data-list-id="<?= $product->id; ?>" class="card">
        <input id="checkbox" class="card__checkbox" type="checkbox">

        <ul class="card__desc">
          <li><?= $product->SKU; ?></li>
          <li><?= $product->name; ?></li>
          <li><?= $product->price; ?> $</li>
          <li><?= $product->getInfo(); ?></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
</main>