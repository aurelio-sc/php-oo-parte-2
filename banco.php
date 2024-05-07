<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\{Conta, ContaCorrente, ContaPoupanca, Titular};
use Alura\Banco\Modelo\{Cpf, Endereco};
use Alura\Banco\Modelo\Funcionario\{Funcionario, Gerente, Diretor, Desenvolvedor};
use Alura\Banco\Service\ControladorDeBonificacoes;

$endereco = new Endereco('São Paulo', 'Bela Vista', 'Rua da Consolação', '12');
$vinicius = new Titular(new CPF('123.456.789-10'), 'Vinicius Dias', $endereco);
$primeiraConta = new ContaCorrente($vinicius);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('698.549.548-10'), 'Patricia', $endereco);
$segundaConta = new ContaPoupanca($patricia);
var_dump($primeiraConta);

$outroEndereco = new Endereco('Vitória', 'Praia do Canto', 'Moacir Avidos', '300');
$outra = new ContaCorrente(new Titular(new CPF('123.654.789-01'), 'Abcdefg', $outroEndereco));
unset($segundaConta);
echo Conta::recuperaNumeroDeContas() . PHP_EOL;

$umaGerente = new Gerente(new Cpf('123.456.789-13'), 'Joana', 'Gerente', 2000);
$umDiretor = new Diretor(new Cpf('123.456.789-13'), 'Lucas', 'Diretor', 13000);
$umDesenvolvedor = new Desenvolvedor(new Cpf('123.456.789-13'), 'Lucas', 'Desenvolvedor', 3000);
$umDesenvolvedor->sobeDeNivel();

echo $umDesenvolvedor->recuperaSalario() . PHP_EOL;

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umaGerente);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umDesenvolvedor);

echo $controlador->recuperaTotal() . PHP_EOL;

