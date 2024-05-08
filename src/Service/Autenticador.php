<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Autenticavel;

class Autenticador
{
    public function tentaLogin(Autenticavel $autenticavel, string $senha): void
    {
        if ($autenticavel->podeAutenticar($senha)) {
            echo "Login realizado com sucesso" . PHP_EOL; 
            return;           
        }
        echo "Senha incorreta" . PHP_EOL;        
    }
}