<?php

use Slim\Http\Request;
use Slim\Http\Response;

function getTwitch ($url) {
    $curl = curl_init();
    curl_setopt_array($curl, array (
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
    ));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array ('Client-ID: nyzcg93y48v67jvju8u2p8yn7abtsf', 'Content-Type: application/json'));
    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    return $response;
}

// Routes

/**
 * To Get all Informations about the Streamer
 */
$app->get('/twitch/{name}', function (Request $request, Response $response, $args) {
    $twitchUserInfo = getTwitch('https://api.twitch.tv/kraken/channels/'.$args['name'].'');
    return $response->withJson($twitchUserInfo, 200);
});

/**
 * Get Current Stream of the User
 */
$app->get('/twitch/stream/{name}', function (Request $request, Response $response, $args) {
    $stream = getTwitch('https://api.twitch.tv/kraken/streams/'.$args['name'].'');
    return $response->withJson($stream, 200);
});