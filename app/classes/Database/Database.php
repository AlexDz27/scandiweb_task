<?php

namespace App\Database;

use PDO;

class Database
{
  private PDO $manager;

  public function __construct()
  {
    $connectionKey = "mysql:host=localhost;dbname=scandiweb_app;charset=utf8mb4";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
    ];

    $this->manager = new PDO($connectionKey, 'root', 'password', $options);
  }

  public function test() {
    if (!$this->manager) {
      echo 'error connecting to db';
    }

    echo 'connected to db';
  }
}