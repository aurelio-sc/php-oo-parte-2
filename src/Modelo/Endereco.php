<?php

namespace Alura\Banco\Modelo;
/**
 * Class Endereco
 * @package Alura\Banco\Modelo
 * @property-read string $cidade
 * @property-read string $rua
 * @property-read string $numero
 * @property-read string $bairro 
 */
class Endereco
{
    private string $cidade;
    private string $bairro;
    private string $rua;
    private string $numero;

    public function __construct(string $cidade, string $bairro, string $rua, string $numero)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    public function recuperaCidade(): string
    {
        return $this->cidade;
    }

    public function recuperaBairro(): string
    {
        return $this->bairro;
    }

    public function recuperaRua(): string
    {
        return $this->rua;
    }

    public function recuperaNumero(): string
    {
        return $this->numero;
    }

    public function alteraCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function alteraBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function alteraRua(string $rua): void
    {
        $this->rua = $rua;
    }

    public function alteraNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return "{$this->rua} , {$this->numero} - {$this->bairro} - {$this->cidade}";
    }

    public function __get(string $atributo):string
    {
        $metodo = 'recupera' . ucfirst($atributo);
        return $this->$metodo();
    }

    public function __set(string $atributo, string $valor)
    {
        $metodo = 'altera' . ucfirst($atributo);
        return $this->$metodo($valor);
    }
}