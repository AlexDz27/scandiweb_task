<?php

use App\Controllers\AbstractController\AbstractController;

class IndexController extends AbstractController
{
  public function index()
  {
    echo $this->renderPage('Index Page', 'content/index');
  }
}