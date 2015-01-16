<?php
$baseDir = dirname(dirname(__FILE__));
return array (
  'plugins' => 
  array (
    'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
    'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
    'Bake' => $baseDir . '/vendor/cakephp/bake/',
  ),
);