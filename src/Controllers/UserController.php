<?php
namespace App\Controllers;

use Illuminate\Database\QueryException;
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
            return $res->withJson([$user]);
        }else{
            return $res->withJson(["message"=>"Nothing found"], 404);
        }
    }
    public function store(Request $req, Response $res, array $args)
    {
        $body = $req->getParsedBody();
        if (empty($body['user_name'])) {
            return $res->withJson(["error"=>"name"], 400);
        }
        if (empty($body['user_email'])) {
            return $res->withJson(["error"=>"email"], 400);
        }
        if (empty($body['user_password'])) {
            return $res->withJson(["error"=>"password"], 400);
        }
        try {
            $id = User::insertGetId($body);
            $newUser = User::find($id);
            return $res->withJson($newUser, 201);
        } catch (QueryException $e) {
            return $res->withJson(["error"=>"User alread exists"], 400);
        }
        return $res->withJson(["error"=>"Registration Failed"], 400);
    }
    public function update(){}
    public function destroy(){}
}
