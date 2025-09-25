<?php

class User
{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;

    public function __construct(int $id, string $nome, string $email, string $senha)
    {
        $this->id = $id;
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setPassword($senha);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = preg_replace('/\s+/', ' ', $nome);
        if (empty($this->nome)) {
            throw new InvalidArgumentException('Nome não pode ser vazio.');
        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if (!Validator::isValidEmail($email)) {
            throw new InvalidArgumentException('Email inválido.');
        }
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setPassword(string $senha): void
    {
        if (!Validator::isStrongPassword($senha)) {
            throw new InvalidArgumentException('Senha deve ter pelo menos 8 caracteres, 1 número e 1 maiúscula.');
        }
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $senha): bool
    {
        return password_verify($senha, $this->senha);
    }

    public function updatePassword(string $novaSenha): void
    {
        $this->setPassword($novaSenha);
    }
}

?>
