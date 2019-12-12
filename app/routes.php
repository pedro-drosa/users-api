<?php
use App\Controllers\UserController;
use Slim\App;
return function (App $app)
{ 
    $validators = require_once __DIR__."/validators.php";
    $app->get('/users', UserController::class.":index");
    $app->get('/users/{id}', UserController::class.":show");
    $app->post('/users', UserController::class.":store")->add($validators());
    $app->put('/users/{id}', UserController::class.":update")->add($validators());
    $app->delete('/users/{id}', UserController::class.":destroy");
};
