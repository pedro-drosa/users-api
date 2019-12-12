<?php
use Respect\Validation\Validator as Validator;
use \DavidePastore\Slim\Validation\Validation as Validation;
return function(){
    $email = Validator::email();
    $name = Validator::alnum('.-_')->notEmpty()->noWhitespace();
    $password = Validator::alnum('.-_@#$')->noWhitespace()->length(8,12);
    $validators = array("user_name" => $name, "user_email" => $email, "user_password"=>$password);
    return new Validation($validators);
};
