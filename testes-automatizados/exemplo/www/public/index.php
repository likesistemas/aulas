<?php

use Like\Exemplo\Operacoes\Divisao;
use Like\Exemplo\Operacoes\Soma;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

include "../vendor/autoload.php";

$app = AppFactory::create();

$app->get('/', function(Request $request, Response $response, array $args) {
    $response->getBody()->write("Exemplo");
    return $response;
});
$app->get('/soma/{numero1}/{numero2}', function (Request $request, Response $response, array $args) {
    $response->getBody()->write(json_encode(['resultado'=>Soma::fazConta(
        $args['numero1'], 
        $args['numero2']
    )]));
    return $response
        ->withHeader('Content-Type', 'application/json');
});
$app->get('/divisao/{numero1}[/{numero2}]', function (Request $request, Response $response, array $args) {
    try {
        $resultado = Divisao::fazConta(
            $args['numero1'], 
            $args['numero2']
        );
        $response->getBody()->write(json_encode([
            'resultado' => $resultado
        ]));
    } catch(LogicException $ex) {
        $error = json_encode([
            'erro' => $ex->getMessage()
        ]);
        $response->getBody()->write($error);
    }

    return $response
        ->withHeader('Content-Type', 'application/json');;
});

$app->get('/produtos/', function (Request $request, Response $response, array $args) {
    
    
    $response->getBody()->write(json_encode(['resultado'=>Soma::fazConta(
        $args['numero1'], 
        $args['numero2']
    )]));
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->run();