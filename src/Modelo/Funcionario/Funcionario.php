<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\{Pessoa, CPF};

abstract class Funcionario extends Pessoa
{    
    private string $cargo;
    private float $salario;

    public function __construct(CPF $cpf, string $nome, string $cargo, float $salario)
    {
        parent::__construct($nome, $cpf);        
        $this->cargo = $cargo;
        $this->salario = $salario;
    }  
    

    public function recuperaCargo(): string
    {
        return $this->cargo;
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

    public function calculaBonificacao(): float
    {
        return $this->salario * 0.1;
    }

    public function recebeAumento(float $aumento): void
    {
        if ($aumento < 0) {
            echo "Aumento deve ser positivo";
            return;
        }
        $this->salario += $aumento;
    }
}