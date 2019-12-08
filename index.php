<?php
require_once __DIR__."/vendor/autoload.php";
$app = new Slim\App();
$routes = require_once __DIR__."/app/routes.php";
$routes($app);
$app->run();
