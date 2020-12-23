<?php

namespace App;

use PDO;

class Database
{
  private PDO $manager;

  public function __construct($config)
  {
    $this->enableManager($config);
  }

  private function enableManager($config) {
    $connectionKey = "mysql:host=${config['host']};dbname=${config['db_name']};charset=${config['charset']}";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
    ];

    $this->manager = new PDO($connectionKey, $config['username'], $config['password'], $options);
  }
}