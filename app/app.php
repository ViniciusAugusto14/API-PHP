<?php

define('API_BASE', 'http://localhost/api/?option=');

echo '<p>APLICACAO</h3><p>';

for($i=0; $i<10; $i++ )
  {
    $resultado = api_request('random&min=100&max=200');
    // verify is response is ok(sucess)
    if($resultado['status'] == 'ERROR'){
       die('Aconteceu um erro na minha chamada de API.');
    }
    echo "O valor randomico: " .  $resultado['data'] . "<br>";
 }

//echo '<pre>';
//print_r(api_request('status'));

echo 'TERMINADO';


function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);
}