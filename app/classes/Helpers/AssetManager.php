<?php

namespace App\Helpers;

class AssetManager
{
  public static function load(array $routesUris, array $assets)
  {
    foreach ($routesUris as $uri) {
      if ($GLOBALS['route_uri'] === $uri) {
        foreach ($assets as $asset) {
          echo $asset;
        }

        break;
      }
    }
  }
}