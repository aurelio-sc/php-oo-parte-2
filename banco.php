<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\{Conta, ContaCorrente, ContaPoupanca, Titular};
use Alura\Banco\Modelo\{Cpf, Endereco};
use Alura\Banco\Modelo\Funcionario\{Gerente, Diretor, Desenvolvedor, EditorVideo};
use Alura\Banco\Service\{ControladorDeBonificacoes, Autenticador};


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

$umaGerente = new Gerente(new Cpf('123.456.789-13'), 'Joana', 2000);
$umDiretor = new Diretor(new Cpf('123.456.789-13'), 'Lucas', 13000);
$umDesenvolvedor = new Desenvolvedor(new Cpf('123.456.789-13'), 'Lucas', 3000);
$umDesenvolvedor->sobeDeNivel();
$umEditor = new EditorVideo(new Cpf('123.456.789-13'), 'João', 2500);

echo $umDesenvolvedor->recuperaSalario() . PHP_EOL;

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umaGerente);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umDesenvolvedor);
$controlador->adicionaBonificacaoDe($umEditor);

echo $controlador->recuperaTotal() . PHP_EOL;

echo '----' . PHP_EOL;

$autenticador = new Autenticador();
$autenticador->tentaLogin($umDiretor, '4321') . PHP_EOL;
$autenticador->tentaLogin($umDiretor, '1234') . PHP_EOL;
$autenticador->tentaLogin($patricia, 'asdf') . PHP_EOL;

echo '----' . PHP_EOL;

echo $endereco . PHP_EOL;
echo $outroEndereco . PHP_EOL;
echo $endereco->rua . PHP_EOL;
echo $endereco->bairro . PHP_EOL;

//$endereco->__set('rua', 'Nova Rua');
$endereco->rua = 'Nova Rua';
echo $endereco->rua;