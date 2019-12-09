<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User as User;

class UserController
{
    public function index(Request $req, Response $res)
    {
        foreach (User::all() as $user) {
            $data[] = $user;
        }
        return $res->withJson($data);
    }
    public function show(){}
    public function store(){}
    public function update(){}
    public function destroy(){}
}
