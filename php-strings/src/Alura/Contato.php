<?php


namespace App\Alura;


class Contato
{
    private string $email;
    private string $endereco;
    private string $cep;
    private string $telefone;

    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        if ($this->validaEmail($email) !== false) {
            $this->email = $email;
        } else {
            $this->email = "Email inválido";
        }

        if ($this->validaTelefone($telefone)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone inválido");
        }
        $this->endereco = $endereco;
        $this->cep = $cep;

    }

    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this->email, "@");

        if ($posicaoArroba === false) {
            return "Usuário inválido";
        }
        return substr($this->email, 0, $posicaoArroba);
    }

    public function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    private function validaTelefone(string $telefone): int
    {
        return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encontrado);
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(" - ", $enderecoCep);
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

}