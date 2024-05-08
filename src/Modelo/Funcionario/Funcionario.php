<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\{Pessoa, CPF};

abstract class Funcionario extends Pessoa
{    
    private float $salario;

    public function __construct(CPF $cpf, string $nome,  float $salario)
    {
        parent::__construct($nome, $cpf);                
        $this->salario = $salario;
    } 

    public function recuperaSalario(): float
    {
        return $this->salario;
    }

    public function alteraNome(string $nome): void
    {
        $this->validaNomePessoa($nome);
        $this->nome = $nome;
    }    

    public function recebeAumento(float $aumento): void
    {
        if ($aumento < 0) {
            echo "Aumento deve ser positivo";
            return;
        }
        $this->salario += $aumento;
    }

    abstract public function calculaBonificacao(): float;
}