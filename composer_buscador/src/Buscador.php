<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;


class Buscador
{
   public $httpclient;
    public $crawler;

    public function __construct(ClientInterface $httpclient, Crawler $crawler){
            $this->httpclient=$httpclient;
            $this->crawler=$crawler;
}


public function buscar($url): array
{

    $response = $this->httpclient->request('GET', $url);
    $html = $response->getBody();
    $this->crawler->addHtmlContent($html);
    $elementosCursos = $this->crawler->filter('span.card-curso__nome');
    $cursos=[];

    foreach ($elementosCursos as $elementoCurso) {
            $cursos[] = $elementoCurso->textContent;
    }
     return $cursos;

}




}