<?php

require_once __DIR__ . '/UserManager.php';

$userManager = new UserManager();

echo "Caso 1: " . $userManager->register('Maria Oliveira', 'maria@email.com', 'Senha123') . "\n";

echo "Caso 2: " . $userManager->register('Pedro', 'pedro@@email', 'Senha123') . "\n";

echo "Caso 3: " . $userManager->login('joao@email.com', 'Errada123') . "\n";

echo "Caso 4: " . $userManager->resetPassword(1, 'NovaSenha1') . "\n";

echo "Caso 5: " . $userManager->register('Outro João', 'joao@email.com', 'OutraSenha1') . "\n";

echo "Verificação login após reset: " . $userManager->login('joao@email.com', 'NovaSenha1') . "\n";

?>