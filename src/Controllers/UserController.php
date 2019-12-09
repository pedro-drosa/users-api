<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User as User;

class UserController
{
    public function index(Request $req, Response $res, array $args)
    {
        foreach (User::all() as $user) {
            $data[] = $user;
        }
        return $res->withJson($data);
    }
    public function show(Request $req, Response $res, array $args)
    {
        $user = User::find($args['id']);
        if ($user) {
            return $res->withJson($user);
        }else{
            return $res->withJson(["message"=>"Nothing found"], 404);
        }
    }
    public function store(){}
    public function update(){}
    public function destroy(){}
}
