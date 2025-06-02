<?php 
    class CSRF {
    public static function generateToken() {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        return $_SESSION['csrf_token'];
    }
    public static function validateToken($token) {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
        }
    }
?>