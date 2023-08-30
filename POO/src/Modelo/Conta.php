<?php

namespace Modelo;

class Conta
{
    private Titular $titular;
    private float $saldo;
    private static $numeroContas = 0;

//    public function sacar($contaSacar, float $valor): void{
//        if ($contaSacar->saldo > $valor or $contaSacar-> saldo < 0 ) {
//            echo "Parametros pra saque invalidos!";
//        }
//    }

    public function __construct(Titular $titular) //em vez de definir o saldo como zero no atributo, definimos no construtor
    {
        $this->titular = $titular;

        $this->saldo = 0;
        Conta::$numeroContas++;
    }

    public function sacar(float $valor): void
    {
        if ($this->saldo < $valor or $this->saldo < 0) {
            echo "Parametros pra saque invalidos!";
        } else {
            $this->saldo -= $valor;
            echo "Saque realizado com sucesso!";
        }
    }

    public function depositar(float $valor)
    {
        if ($valor <= 0) {
            echo "não foi possivel depositar";
        } else {
            $this->saldo += $valor;
            echo "Deposito feito";
        }
    }

    public function transferir(float $valor, Conta $c)
    {
        if ($valor > $this->saldo or $valor < 0) {
            echo "Não foi possivel transferir";
        } else {
            $this->sacar($valor);
            $c->depositar($valor);//eu não posso fazer um this.depositar, pois depositos não
            //tem como parametro uma Conta parametros. Ela é feita DE sua conta PARA sua conta conta
            echo "Transferido!";

        }
    }


    public static function recuperaNumConta(): int
    {
        return Conta::$numeroContas;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getTitular(): Titular
    {
        return $this->titular;
    }

    public function setTitular(Titular $titular): void
    {
        $this->titular = $titular;
    }


}