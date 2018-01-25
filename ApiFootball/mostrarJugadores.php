<?php

    require 'vendor/autoload.php';
    use GuzzleHttp\Client;  
    $client = new Client();

    $uri = $_REQUEST["code"];
    $header = array('headers' => array('X-Auth-Token' => '25aa2d129754447984d433d72ab59d94'));
    $response = $client->get($uri, $header);          
    $json = json_decode($response->getBody());
    
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title></title>
        <style>
            img{
                width: 60px;
                height: 60px;
            }
        </style>
    </head>
    <body>
        <h1>Jugadores de <?php echo $_REQUEST["name"]?></h1>
        <table class="table table-hover">
            <tr>
            <th>nombre</th>
            <th>Posicion</th>
            <th>Dorsal</th>
            <th>Nacionalidad</th>
            </tr>
            <?php
                foreach ( $json->players as $player)
                {
            ?>
            <tr>
                <td><?php echo $player->name ?></td>
                <td><?php echo $player->position ?></td>
                <td><?php echo $player->jerseyNumber ?></td>
                <td><?php echo $player->nationality ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
    </html>


