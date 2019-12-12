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
        if(isset($data)){
            return $res->withJson($data);
        }
        return $res->withJson(['message'=>"Nothing found"]);
    }
    public function show(Request $req, Response $res, array $args)
    {
        $user = User::find($args['id']);
        if ($user) {
            return $res->withJson([$user]);
        }else{
            return $res->withJson(["message"=>"User not found"], 404);
        }
    }
    public function store(Request $req, Response $res, array $args)
    {
        $body = $req->getParsedBody();
        if($req->getAttribute('has_errors')){
            $err = $req->getAttribute('errors');
            return $res->withJson($err, 400);
          } else {
            try {
                $id = User::insertGetId($body);
                $newUser = User::find($id);
                return $res->withJson($newUser, 201);
            } catch (QueryException $err) {
                return $res->withJson(["error"=>"User alread exists"], 400);
            }
        }
    }
    public function update(Request $req, Response $res, array $args)
    {
        $body = $req->getParsedBody();
        $return = User::where('id', $args['id'])->update($body);
        if($return > 0){
            return $res->withJson(User::find($args['id']),201);
        }
        return $res->withJson(["error"=>"No data changed"]);
    }
    public function destroy(Request $req, Response $res, array $args)
    {
        User::destroy($args['id']);
    }
}
