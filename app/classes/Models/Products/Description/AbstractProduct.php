<?php

namespace App\Models\Products\Description;

abstract class AbstractProduct
{
  public int $id;
  public int $SKU;
  public string $name;
  public float $price;
}