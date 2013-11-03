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
    $accept = $app->request->headers->get('Accept');

    if ($accept == 'application/json') {
        $app->redirect('/lbt?version=1', 301);
    }

    $app->render('index.html');
});

// $version and $format aren't currently in use. They're here for future api versioning
$app->get('/lbt(/:version(/:format))', function ($version = 1, $format = 'json') use ($app) {

    $jsend = new JSendResponse('success', array(
        'name' => 'Exploits of a Mom',
        'permalink' => 'http://xkcd.com/327/',
        'image' => 'http://imgs.xkcd.com/comics/exploits_of_a_mom.png',
        'link' => $app->request->getPathInfo() . sprintf('?version=%d&format=%s', $version, $format),
    ));

    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setBody($jsend->encode());

    return $app->response;
});

// Run app
$app->run();
