<?php

use App\Controllers\UserController;
use Slim\App;

return function (App $app)
{
    $app->get('/users', UserController::class.":index");
    $app->get('/users/{id}', UserController::class.":show");
    $app->post('/users', UserController::class.":store");
    $app->put('/users/{id}', UserController::class.":update");
};
