<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \hangman\MakeWord;
use \hangman\MakeLevels;

require '../../vendor/autoload.php';

$app = new Slim\App();

session_start();

/**
 * @param Request|\Psr\Http\Message\ServerRequestInterface $req
 * @param Response|\Psr\Http\Message\ResponseInterface $res
 * @return mixed
 */
$app->get('/hangman/api/v1/levels[/]', function (Request $req, Response $res) {
    return $res->withHeader('Content-Type', 'application/json')->write(MakeLevels::getLevels());
});

$app->get('/hangman/api/v1/words[/]', function (Request $req, Response $res, $args) {
    return $res->withHeader('Content-Type', 'application/json')->write(MakeWord::getWords());
});

$app->get('/hangman/api/v1/words/{diff:[0-9]+}', function (Request $req, Response $res, $args) {
    return $res->withHeader('Content-Type', 'application/json')->write(MakeWord::getWord($args['diff']));
});

$app->run();