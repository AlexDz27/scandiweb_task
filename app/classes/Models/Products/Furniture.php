<?php

namespace App\Models\Products;

use App\Models\Products\Description\AbstractProduct;
use App\Models\Products\Description\ProductInterface;

class Furniture extends AbstractProduct implements ProductInterface
{
  public float $height;
  public float $width;
  public float $length;

  public function __construct($id, $SKU, $name, $price, $height, $width, $length)
  {
    $this->id = $id;
    $this->SKU = $SKU;
    $this->name = $name;
    $this->price = $price;
    $this->height = $height;
    $this->width = $width;
    $this->length = $length;
  }

  public function getInfo(): string
  {
    return "Dimension: {$this->height}x{$this->width}x{$this->length}";
  }
}