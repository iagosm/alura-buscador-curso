<?php

require 'vendor/autoload.php';

use Iagosm\BuscadorCurso\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('https://www.alura.com.br/cursos-online-programacao/php');
// var_dump($cursos);exit;

foreach ($cursos as $curso) {
   exibeMensagem($curso);
    // echo $curso . '</br>';
}

// $cursos->each(function (Crawler $curso, $i){
//   echo $curso->text(). PHP_EOL;
// });