<?php

use App\Controllers\AbstractController\AbstractController;
use App\Storage\Queries\Models\ProductQuery;

class IndexController extends AbstractController
{
  public function index()
  {
    $products = (new ProductQuery())->getAll();
    
    var_dump($products);
    die();
    
    
    echo $this->renderPage('Index Page', 'content/index', compact('products'));
  }
}