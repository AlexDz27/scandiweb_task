<?php

namespace App\Storage\Queries\Models\Product;

use App\Models\Products\Description\AbstractProduct;
use App\Models\Products\Book;
use App\Models\Products\Disc;
use App\Models\Products\Furniture;
use Exception;

class ProductConstructor
{
  static public function construct(...$args): AbstractProduct
  {
    $productData = array_filter($args); // Removing null values got from SELECTs with JOINs
    $productType = $productData[2];

    if ($productType === 'disc') {
      unset($productData[2]); // Delete 'type' => 'disc' key-value pair to properly populate Model
      return new Disc(...$productData);
    }

    if ($productType === 'book') {
      unset($productData[2]);
      return new Book(...$productData);
    }

    if ($productType === 'furniture') {
      unset($productData[2]);
      return new Furniture(...$productData);
    }

    throw new Exception("Undefined productType used, got $productType");
  }
}