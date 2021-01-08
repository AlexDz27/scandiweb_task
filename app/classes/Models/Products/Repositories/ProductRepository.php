<?php

namespace App\Models\Products\Repositories;

use App\Models\Products\Repositories\ProductConstructor;
use PDO;
use PDOException;
use App\Storage\Database;

class ProductRepository
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

  public function deleteByIds(array $ids)
  {
    $inQuery = implode(', ', array_fill(0, count($ids), '?'));

    $query = "DELETE FROM products WHERE id IN ($inQuery)";

    $resultMessage = '';
    try {
      $stmt = $this->dbManager->prepare($query);
      foreach ($ids as $index => $id) {
        $stmt->bindValue($index + 1, $id);
      }

      $stmt->execute();

      $resultMessage = 'Successfully deleted products.';
    } catch (PDOException $exception) {
      http_response_code(500);
      var_dump($exception);
      $resultMessage = 'Error accessing database.';
    }

    return $resultMessage;
  }
}

