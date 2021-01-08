<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  use App\Helpers\AssetManager;

  AssetManager::load(
    ['/product/list', '/some'],
    ['<link rel="stylesheet" href="/assets/css/style.css">']
  );
  ?>
  <title><?= /** @var string $title */ $title; ?></title>
</head>
<body>

