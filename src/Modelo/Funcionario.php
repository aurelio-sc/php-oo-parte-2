<?php

namespace Alura\Banco\Modelo;

class Funcionario extends Pessoa
{    
    private string $cargo;

    public function __construct(CPF $cpf, string $nome, string $cargo)
    {
        parent::__construct($nome, $cpf);        
        $this->cargo = $cargo;
    }  
    

    public function recuperaCargo(): string
    {
        return $this->cargo;
    }

    public function alteraNome(string $nome): void
    {
        $this->validaNomePessoa($nome);
        $this->nome = $nome;
    }
}