<?php

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/Validator.php';

class UserManager
{
    private array $usuarios = [];

    public function __construct()
    {
        $this->usuarios[] = new User(1, 'João Silva', 'joao@email.com', 'SenhaForte1');
    }

    public function register(string $nome, string $email, string $senha): string
    {

        foreach ($this->usuarios as $user) {
            if ($user->getEmail() === $email) {
                return 'E-mail já está em uso.';
            }
        }

        try {
            $id = count($this->usuarios) + 1;
            $user = new User($id, $nome, $email, $senha);
            $this->usuarios[] = $user;
            return 'Usuário cadastrado com sucesso.';
        } catch (InvalidArgumentException $e) {
            return $e->getMessage();
        }
    }

    public function login(string $email, string $senha): string
    {
        foreach ($this->usuarios as $user) {
            if ($user->getEmail() === $email) {
                if ($user->verifyPassword($senha)) {
                    return 'Login realizado com sucesso.';
                } else {
                    return 'Credenciais inválidas.';
                }
            }
        }
        return 'Credenciais inválidas.';
    }

    public function resetPassword(int $id, string $novaSenha): string
    {
        foreach ($this->usuarios as $user) {
            if ($user->getId() === $id) {
                try {
                    $user->updatePassword($novaSenha);
                    return 'Senha alterada com sucesso.';
                } catch (InvalidArgumentException $e) {
                    return $e->getMessage();
                }
            }
        }
        return 'Usuário não encontrado.';
    }

    public function getUsuarios(): array
    {
        return $this->usuarios;
    }
}

?>
