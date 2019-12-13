<?php

namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PasswordMiddleware 
{
    public function __invoke(Request $req, Response $res, $next)
    {
        $body = $req->getParsedBody();
        $body['user_password'] = password_hash($body['user_password'], PASSWORD_BCRYPT,array("cost"=>10));
        $req = $req->withAttribute('body',$body);
        $res = $next($req, $res);
        return $res;
    }
}
