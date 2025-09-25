<?php

class Validator
{
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isStrongPassword(string $password): bool
    {
        return strlen($password) >= 8 &&
               preg_match('/[0-9]/', $password) &&
               preg_match('/[A-Z]/', $password);
    }
}

?>