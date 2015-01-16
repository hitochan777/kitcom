<?php
use Cake\Routing\Router;

Router::plugin('UsefulHelpers', function($routes) {
	$routes->fallbacks();
});
