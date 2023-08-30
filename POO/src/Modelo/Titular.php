<?php


namespace Modelo;

use Endereco;

class Titular extends Pessoa
{


    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf, $endereco);

    }


}
