<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes

/**
 * Testing if API is Available
 */
$app->get('/ping', function (Request $request, Response $response) {
    return $response->withJson(['message' => 'Ping is Working'], 200);
});