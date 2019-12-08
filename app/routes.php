<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app)
{
    $app->get('/users', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });
};