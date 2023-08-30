<?php

namespace Modelo;

use Endereco;

class Funcionario extends Pessoa
{
    private string $cargo;

    public function __construct(string $nome, CPF $CPF, $cargo, Endereco $endereco)
    {
        parent::__construct($nome, $CPF, $endereco);

        $this->cargo = $cargo;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

}