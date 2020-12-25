<?php

use App\Controllers\AbstractController\AbstractController;

class SomeController extends AbstractController
{
  public function some()
  {
    echo $this->renderPage('Some Page', 'content/some');
  }
}