<?php

    require 'vendor/autoload.php';
    use GuzzleHttp\Client;  
    $client = new Client();

    $uri = 'http://api.football-data.org/v1/competitions/?season=2017';
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
        <h1>Ligas de Futbol Profesional</h1>
        <table class="table table-hover">
            <tr>
            <th>Nombre</th>
            </tr>
            <?php
                foreach ( $json as $team)
                {
            ?>
            <tr onclick="location='http://localhost:8000/mostrarEquipos.php?code=<?php echo $team->_links->teams->href ?>&caption=<?php echo $team->caption ?>'">
                <td><?php echo $team->caption ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
    </html>