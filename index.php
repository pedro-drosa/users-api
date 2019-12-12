<?php
//Loading Dependencies
require_once __DIR__."/vendor/autoload.php";
//Set Configuration
$config = require_once __DIR__."/app/config.php";
//Register Container
$container = new Slim\Container($config);
// Register Connection
$illuminate = require_once __DIR__."/app/illuminate.php";
$illuminate($container);
$app = new \Slim\App($container);
//Register routes
$routes = require_once __DIR__."/app/routes.php";
$routes($app);
//Start application
$app->run();
