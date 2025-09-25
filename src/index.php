<?php

require_once __DIR__ . '/UserManager.php';

$userManager = new UserManager();

echo "Caso 1: " . $userManager->register('Maria Oliveira', 'maria@email.com', 'Senha123') . "<br>";

echo "Caso 2: " . $userManager->register('Pedro', 'pedro@@email', 'Senha123') . "<br>";

echo "Caso 3: " . $userManager->login('joao@email.com', 'Errada123') . "<br>";

echo "Caso 4: " . $userManager->resetPassword(1, 'NovaSenha1') . "<br>";

echo "Caso 5: " . $userManager->register('Outro João', 'joao@email.com', 'OutraSenha1') . "<br>";

?>
