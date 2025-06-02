<?php
    class Dsb {
        private static $instance;

        public static function getConnection() {
            if (!self::$instance) {
                try {
                    self::$instance = new PDO("mysql:host=localhost;port=3307;dbname=loja_online", "root", "");
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Erro de conexão: " . $e->getMessage());
                }

                self::preCarga();
            }
            return self::$instance;
        }   

        private static function preCarga() {
            $db = self::$instance;

            try {
                // Verifica se já existe algum usuário cadastrado
                $stmt = $db->query("SELECT COUNT(*) FROM usuarios");
                $totalUsuarios = $stmt->fetchColumn();

                if ($totalUsuarios == 0) {
                    // Inserção de dados (como no seu código)
                    // ...
                    echo "<p>✅ Pré-carga executada com sucesso.</p>";
                } else {
                    echo "<p>ℹ️ Pré-carga ignorada (já há usuários cadastrados).</p>";
                }
            } catch (PDOException $e) {
                echo "Erro durante a pré-carga: " . $e->getMessage();
            }
        }
    }
?>
