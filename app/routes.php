<?php

use App\Controllers\User as Controller;
use Slim\App;

return function (App $app)
{
    $app->get('/users',Controller::class.":index");
};
