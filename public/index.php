<?php
require '../vendor/autoload.php';

use JSend\JSendResponse;

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Create monolog logger and store logger in container as singleton
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Psr\Log\LogLevel::DEBUG));

    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get('/', function () use ($app) {

    $success = new JSendResponse('success', array(
        'name' => 'Exploits of a Mom',
        'permalink' => 'http://xkcd.com/327/',
        'image' => 'http://imgs.xkcd.com/comics/exploits_of_a_mom.png',
    ));

    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setBody($success->encode());

    return $app->response;
});

// Run app
$app->run();
