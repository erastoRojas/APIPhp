<?php

    require 'vendor/autoload.php';
    use GuzzleHttp\Client;  
    $client = new Client();

    $uri = 'http://api.football-data.org/v1/competitions/455/teams';
    $header = array('headers' => array('X-Auth-Token' => '25aa2d129754447984d433d72ab59d94'));
    $response = $client->get($uri, $header);          
    $json = json_decode($response->getBody());/*var_dump($json->teams[0]->_links); */
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
        <h1>Primera División de Futbol Española</h1>
        <table class="table table-hover">
            <tr>
            <th>Equipo</th>
            <th>Escudo</th>
            </tr>
            <?php
                foreach ( $json->teams as $team)
                {
            ?>
            <tr onclick="location='http://localhost:8000/mostrarJugadores.php?code=<?php echo $team->_links->players->href ?>'">
                <td><?php echo $team->name ?></td>
                <td><img src="<?php echo $team->crestUrl ?>"</td>
            </tr>
            <?php } ?>
        </table>
    </body>
    </html>
    

