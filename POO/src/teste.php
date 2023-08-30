<?php

use Modelo\Conta;
use Modelo\CPF;
use Modelo\Titular;

require_once 'Conta.php';
require_once 'Titular.php';
require_once 'src/CPF.php';
require_once 'Endereco.php';




$endereco = new Endereco('SP', "Pico D'Olho D'Agua", 'Av. Paineiras', '71b');
$c = new Conta (new Titular(new CPF(47464808851),
    'Mayara', $endereco));
        echo $c->getTitular()->getNome() . PHP_EOL;
        $c->depositar(1300) . PHP_EOL;

        $c2 = new Conta(new Titular(new CPF(12345678911),'Andreia', $endereco));
        $c2->depositar(1056);
        $c->transferir(200, $c2);

        echo "Conta 1 : " .  $c->getSaldo(). PHP_EOL;
        echo "Conta 2: ". $c2->getSaldo() . PHP_EOL;
        echo Conta::recuperaNumConta();













function criarConta(string $cpf, string $titular, float $saldo){
    return [
        $cpf =>[
            'titular' => $titular,
            'saldo' => $saldo,
        ]
    ];

}