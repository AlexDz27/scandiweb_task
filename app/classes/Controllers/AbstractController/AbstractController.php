<?php

namespace App\Controllers\AbstractController;

abstract class AbstractController
{
  public function renderPage(string $title, string $path, array $vars = []): string
  {
    $output = $this->render('layouts/head', compact('title'));
    $output .= $this->render($path, $vars);
    $output .= $this->render('layouts/footer');

    return $output;
  }

  public function render(string $path, array $vars = []): string
  {
    extract($vars);

    ob_start();
    require $GLOBALS['templates_dir'] . $path . '.php';

    return ob_get_clean();
  }
}