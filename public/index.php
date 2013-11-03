<?php
require '../vendor/autoload.php';

use JSend\JSendResponse;

// Prepare app
$app = new \Slim\Slim();

// Define routes
$app->get('/', function () use ($app) {

    $jsend = new JSendResponse('success', array(
        'name' => 'Exploits of a Mom',
        'permalink' => 'http://xkcd.com/327/',
        'image' => 'http://imgs.xkcd.com/comics/exploits_of_a_mom.png',
    ));

    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setBody($jsend->encode());

    return $app->response;
});

// Run app
$app->run();
