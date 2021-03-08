<?php

require __DIR__ . "/vendor/autoload.php";

session_start();

$router = new Faculdade\Moinhos\Router;

require __DIR__ . "/config/containers.php";
require __DIR__ . "/config/events.php";

$app = new \Faculdade\Moinhos\App($container);

$router = $app->getRouter();

require __DIR__ . "/config/middlewares.php";
require __DIR__ . "/config/routes.php";

$app->run();