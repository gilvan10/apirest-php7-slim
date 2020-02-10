<?php


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require_once "vendor/autoload.php";

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$mid01 = function(Request $request, Response $response, $next): Response {
    $response->getBody()->write("Dentro do Middleware 01 <br>");
    $response = $next($request,$response);
    $response->getBody()->write("Dentro do Middleware 02 <br>");

    return $response;
};

$app->get('/produtos', function(Request $request, Response $response, array $args){
    return $response->getBody()->write('Olá');

    //você quizer passar nome via argument '/{nome}' se quizer que seja
    //opcional '/[{nome}]' $nome = $args['nome'] ?? 'mouse';

    //Quando voce tiver passando parametros via url, esse valor 10 é dafault
    //$limit = $request->getQueryparams()['limit'];
    //return $response->getBody()->write( $limit. ' Produtos do banco de dados com o nome');

});

$app->post('/produtos', function(Request $request, Response $response, array $args){
    $data = $request->getParseBody();
    $nome = $data['nome'] ?? '';

    return $response->getBody()->write('Produto ' .$nome. "POST");

})->add($mid01);

$app->put('/produtos', function(Request $request, Response $response, array $args){
    $data = $request->getParseBody();
    $nome = $data['nome'] ?? '';

    return $response->getBody()->write('Produto ' .$nome. "PUT");
});

$app->delete('/produtos', function(Request $request, Response $response, array $args){
    $data = $request->getParseBody();
    $nome = $data['nome'] ?? '';

    return $response->getBody()->write('Produto ' .$nome. "DELETE");
});

$app->run();