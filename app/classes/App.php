<?php

namespace App;

use Error;

class App
{
  public function __construct(string $mode)
  {
    $this->configure($mode);
  }

  private function configure(string $mode)
  {
    if ($mode !== 'development' && $mode !== 'production') {
      throw new Error('Undefined mode set: ' . $mode .'. Must be "development" or "production"');
    }

    if ($mode === 'development') {
      $GLOBALS['config'] = require_once $GLOBALS['project_dir'] . '/config/config/config.development.php';
    }

    if ($mode === 'production') {
      $GLOBALS['config'] = require_once $GLOBALS['project_dir'] . '/config/config/config.production.php';
    }
  }
}