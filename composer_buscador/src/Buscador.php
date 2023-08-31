<?php

namespace Alura\BuscadorDeCursos;
//composer dump-autoload para atualizar o composer json
//"autoload": {
        //"classmap": ""[
    //            ./Teste.php (diretorio base + nome do arquivo ou Classe)
      //  ]
       // "psr-4": {
          //"Alura\\BuscadorDeCursos\\" : "src/"
       // }
// vendor\bin\phpcs --standard=PSR12 composer_buscador/src/


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