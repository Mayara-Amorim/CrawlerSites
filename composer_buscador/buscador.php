<?php
require 'vendor/autoload.php';


use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;

use Symfony\Component\DomCrawler\Crawler;


$client = $client = new Client(['curl' => array( CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false ),
'allow_redirects' => false,
'cookies' => true,
'verify' => false
]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);

$cursos= $buscador->buscar('https://www.alura.com.br/cursos-online-programacao/php');
foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
