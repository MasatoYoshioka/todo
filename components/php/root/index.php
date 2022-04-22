<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Todo\AppModule;
use App\Todo\Container;
use App\Todo\Handlers\Task\Index;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$container = Container::createFromRayDi(new AppModule);

$app = AppFactory::createFromContainer($container);
$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/tasks', Index::class);

$app->run();
