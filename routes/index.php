<?php


use function src\slimConfiguration;
use \App\Controllers\ProdutoController;

$app = new \Slim\App(slimConfiguration());


$app->get('/', ProdutoController::class . ':getProdutos');
//outraforma
//$app->get('/', \App\Controllers\ProdutoController:getProdutos');

$app->run();