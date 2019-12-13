<?php
namespace App\Controllers;

use Illuminate\Database\QueryException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User as User;

class UserController
{
    public function index(Request $req, Response $res, array $args):Response
    {
        foreach (User::all() as $user) {
            $data[] = $user;
        }
        if(isset($data)){
            return $res->withJson($data);
        }
        return $res->withJson(['message'=>"Nothing found"], 400);
    }
    public function show(Request $req, Response $res, array $args):Response
    {
        $user = User::find($args['id']);
        if ($user) {
            return $res->withJson($user);
        }
        return $res->withJson(["message"=>"User not found"], 404);
    }
    public function store(Request $req, Response $res, array $args):Response
    {
        if($req->getAttribute('has_errors')){
            return $res->withJson($req->getAttribute('errors'), 400);
        } else {
            try {
                $newUser = User::find(User::insertGetId($req->getAttribute('body')));
                return $res->withJson($newUser, 201);
            } catch (QueryException $err) {
                return $res->withJson(["error"=>"User alread exists"], 400);
            }
        }
    }
    public function update(Request $req, Response $res, array $args):Response
    {   
        if($req->getAttribute('has_errors')){
            return $res->withJson($req->getAttribute('errors'), 400);
        } else {
            try {
                if(User::where('id', $args['id'])->update($req->getAttribute('body'))){
                    return $res->withJson(User::find($args['id']), 200);
                }
                return $res->withJson(["error"=>"No data changed"], 400);
            } catch (QueryException $err) {
                return $res->withJson(["error"=>"User alread exists"], 400);
            }
        }
    }
    public function destroy(Request $req, Response $res, array $args):Response
    {
        if(User::destroy($args['id'])){
            return $res->withJson(["message"=>"successfully removed"], 200);
        }
        return $res->withJson(["error"=>"No data changed"], 400);
    }
}
