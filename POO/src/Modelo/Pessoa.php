<?php

namespace Modelo;

use Endereco;

class Pessoa
{
    protected string $nome;
    private CPF $CPF;
    private Endereco $endereco;


    public function __construct(string $nome, CPF $CPF, Endereco $endereco)
    {
        $this->validarTitular($nome);
        $this->nome = $nome;
        $this->CPF = $CPF;
        $this->endereco = $endereco;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCPF(): CPF
    {
        return $this->CPF;
    }

    protected function validarTitular(string $nome)
    {
        if (strlen($nome) < 5) {
            echo "Nome menor do que o permitido";
        }
        exit();
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

}