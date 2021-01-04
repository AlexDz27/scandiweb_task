<?php

use App\Controllers\AbstractController\AbstractController;

class NotFoundController extends AbstractController
{
  public function notFound()
  {
    http_response_code(404);
    echo $this->renderPage('404', 'content/404');
  }
}