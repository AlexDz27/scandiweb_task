<?php

namespace App\Storage\Queries\Models\Product;

use App\Storage\Queries\Models\Product\ProductConstructor;
use PDO;
use App\Storage\Database;

class ProductQuery
{
  private PDO $dbManager;

  public function __construct()
  {
    $this->dbManager = (new Database())->getManager();
  }

  public function getAll(): array
  {
    $query = "
    SELECT p.id, p.SKU, p.type, p.name, p.price, d.size, b.weight, f.height, f.width, f.length FROM products p
    LEFT JOIN product_type_disc d ON p.id = d.product_id
    LEFT JOIN product_type_book b ON p.id = b.product_id
    LEFT JOIN product_type_furniture f ON p.id = f.product_id
    ";
    $stmt = $this->dbManager->query($query);

    return $stmt->fetchAll(PDO::FETCH_FUNC, [ProductConstructor::class, 'construct']);
  }
}

