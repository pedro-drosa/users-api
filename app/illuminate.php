<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Slim\Container;
return function(Container $container)
{
    $capsule = new Capsule;
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
};