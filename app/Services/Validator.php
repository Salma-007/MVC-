<?php

namespace App\Services;

class Validator {
    public static function isEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isInt($value): bool {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public static function isValidPassword(string $password): bool {
        return strlen($password) >= 8 && preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password);
    }
}