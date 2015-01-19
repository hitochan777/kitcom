<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CakePdf' => $baseDir . '/vendor/friendsofcake/cakepdf/',
        'Bootstrap3' => $baseDir . '/vendor/holt59/cakephp3-bootstrap3-helpers/',

    ]
];
