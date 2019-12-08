<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class User
{
    public function index(Request $req, Response $res)
    {
        $res->getBody()->write('Hello world!');
        return $res;
    }
    public function show(){}
    public function store(){}
    public function update(){}
    public function destroy(){}
}
