<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/env.php';

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

// Set that to your needs
$displayErrorDetails = env('APP_DEBUG', true);

$app = AppFactory::create();
$app->addErrorMiddleware($displayErrorDetails, false, false);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

return $app;
