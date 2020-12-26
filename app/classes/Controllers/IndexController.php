<?php

use App\Controllers\AbstractController\AbstractController;
use App\Storage\Queries\Models\Product\ProductQuery;

class IndexController extends AbstractController
{
  public function index()
  {
    $products = (new ProductQuery())->getAll();
    
    echo $this->renderPage('Index Page', 'content/index', compact('products'));
  }
}