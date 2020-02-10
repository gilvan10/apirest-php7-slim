<?php



namespace App\Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


final class ProdutoController {

    public function getProdutos(Request $request, Response $response, array $args): Response {


        //$response->getBody->write("Hello world");

        //Se quizer retornar um json
        $response = $response->withJson([
          "message" => "Hello world"
        ]);

        $lojasDAO = new LojasDAO();
        $lojasDAO->teste();

        return $response;
    }

}