<?php


namespace App\Alura;


class Usuario
{
    private string $nome;
    private string $sobrenome;
    private string $senha;
    private string $genero;
    private string $tratamento;

    public function __construct(string $nome, string $senha, string $genero)
    {
        $nomeSobrenome = explode(" ", $nome, 2);

        if ($nomeSobrenome[0] === "") {
            $this->nome = "Nome inválido";
        } else {
            $this->nome = $nomeSobrenome[0];
        }

        if (isset($nomeSobrenome[1])) {
            $this->sobrenome = $nomeSobrenome[1];
        } else {
            $this->sobrenome = "Sobrenome inválido";
        }
        $this->validaSenha($senha);
        $this->genero = $genero;

        $this->adicionaTratamentAoSobrenome($nome, $genero);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    private function adicionaTratamentAoSobrenome(string $nome, string $genero)
    {
        if ($genero === 'M') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nome, 1);
        }

        if ($genero === 'F') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nome, 1);
        }
    }

    private function validaSenha(string $senha): void
    {
        $tamanhoSenha = strlen(trim($senha));

        if ($tamanhoSenha > 6) {
            $this->senha = $senha;
        } else {
            $this->senha = "Senha inválida";
        }
    }

    public function getTratamento(): string
    {
        return $this->tratamento;
    }
}