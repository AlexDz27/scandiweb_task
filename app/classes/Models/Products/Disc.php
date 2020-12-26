<?php

namespace App\Models\Products;

use App\Models\Products\Description\AbstractProduct;
use App\Models\Products\Description\ProductInterface;

class Disc extends AbstractProduct implements ProductInterface
{
  public float $size;
  
  public function __construct($id, $SKU, $name, $price, $size)
  {
    $this->id = $id;
    $this->SKU = $SKU;
    $this->name = $name;
    $this->price = $price;
    $this->size = $size;
  }

  public function getInfo(): string
  {
    return "Size: {$this->size} MB";
  }
}