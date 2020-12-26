<?php

namespace App\Models\Products;

use App\Models\Products\Description\AbstractProduct;
use App\Models\Products\Description\ProductInterface;;

class Book extends AbstractProduct implements ProductInterface
{
  public float $weight;

  public function __construct($id, $SKU, $name, $price, $weight)
  {
    $this->id = $id;
    $this->SKU = $SKU;
    $this->name = $name;
    $this->price = $price;
    $this->weight = $weight;
  }

  public function getInfo(): string
  {
    return "Weight: {$this->weight} KG";
  }
}