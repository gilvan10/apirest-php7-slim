<?php

namespace src;

function slimConfiguration(): \Slim\Container {
//video 6
    $configuration = [
        'settings' => [
            'displayErrorDetails' => getenv('DISPLAY_ERROS_DETAILS'),
        ],
    ];
    return new \Slim\Container($configuration);

}