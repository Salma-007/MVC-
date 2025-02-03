<?php

namespace App\Core;

class Security {
    public static function sanitizeString(string $data): string {
        return htmlspecialchars(strip_tags($data), ENT_QUOTES, 'UTF-8');
    }

    public static function sanitizeArray(array $data): array {
        return array_map([self::class, 'sanitizeString'], $data);
    }

    public static function verifyCsrfToken(string $token): bool {
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
    }

    public static function generateCsrfToken(): string {
        return $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}
