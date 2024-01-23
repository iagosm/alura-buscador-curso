<?php

namespace Iagosm\BuscadorCurso;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador 
{
  private $htppClient;
  private $crawler;

  public function __construct(ClientInterface $httpClient, Crawler $crawler)
  {
    $this->htppClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function buscar($url) 
  {
    $resposta = $this->htppClient->request('GET', $url);
    $html = $resposta->getBody();
    $this->crawler->addHtmlContent($html);
    $elementosCursos = $this->crawler->filter('span.card-curso__nome');
    $cursos = [];

    foreach($elementosCursos as $elemento) {
      $cursos[] = $elemento->textContent; 
    }
    return $cursos;
  }
}