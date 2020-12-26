<?php
/** @var Product $products */
?>

<header>
  <h1>Product List</h1>

  <nav>
    <a href="#">Add</a>
    <button type="button">Mass Delete</button>
  </nav>
</header>

<main>
  <ul>
    <?php foreach ($products as $product): ?>
      <li>
        <ul>
          <li><?= $product->SKU; ?></li>
          <li><?= $product->name; ?></li>
          <li><?= $product->price; ?></li>
          <li><?= $product->getInfo(); ?></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
</main>