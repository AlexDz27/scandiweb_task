<?php

namespace App\Storage\Queries\Models;

use PDO;
use App\Storage\Database;
use App\Models\Product;

class ProductQuery
{
  private PDO $dbManager;

  public function __construct()
  {
    $this->dbManager = (new Database())->getManager();
  }

  /**
   * @return Product[]
   */
  public function getAll(): array
  {
    $query = "
    SELECT p.id, p.SKU, p.name, p.price, d.size, b.weight, f.height, f.width, f.length FROM products p
    LEFT JOIN product_type_disc d ON p.id = d.product_id
    LEFT JOIN product_type_book b ON p.id = b.product_id
    LEFT JOIN product_type_furniture f ON p.id = f.product_id
    ";
    $stmt = $this->dbManager->query($query);

    $products = $stmt->fetchAll();

    return $products;
  }
}