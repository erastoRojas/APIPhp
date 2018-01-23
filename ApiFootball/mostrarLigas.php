<?php

    require 'vendor/autoload.php';
    use GuzzleHttp\Client;  
    $client = new Client();

    $uri = 'http://api.football-data.org/v1/competitions/?season=2015';
    $header = array('headers' => array('X-Auth-Token' => '25aa2d129754447984d433d72ab59d94'));
    $response = $client->get($uri, $header);          
    $json = json_decode($response->getBody());/*var_dump($json->teams[0]->_links); */
    var_dump($json);
?>