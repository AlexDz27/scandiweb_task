<?php

use App\Controllers\AbstractController\AbstractController;
use App\Models\Products\Repositories\ProductRepository;

class ProductController extends AbstractController
{
  public $repository;

  public function __construct()
  {
    $this->repository = new ProductRepository();
  }

  public function list()
  {
    $products = $this->repository->getAll();

    echo $this->renderPage('Index Page', 'content/index', compact('products'));
  }

  public function delete()
  {
    $ids = json_decode(file_get_contents('php://input'));

    echo $this->repository->deleteByIds($ids);
  }
}