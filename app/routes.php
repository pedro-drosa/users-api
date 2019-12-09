<?php

use App\Controllers\UserController;
use Slim\App;

return function (App $app)
{
    $app->get('/users',UserController::class.":index");
};
