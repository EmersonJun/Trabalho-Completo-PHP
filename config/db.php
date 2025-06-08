<?php
define('BASE_URL', '/TrabalhoF2-PHP/TrabalhoF-PHP-main/');

class DB {
    private static $instance;

    public static function getConnection() {
        if (!self::$instance) {
            try {
                self::$instance = new PDO("mysql:host=localhost;port=3307;dbname=loja_online", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
