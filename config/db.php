<?php
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

            self::preCarga();
        }
        return self::$instance;
    }
    private static function preCarga() {
    $db = self::$instance;

    try {
        // Inserir usuários
        $usuarios = [
            ['nome' => 'Admin', 'email' => 'admin@loja.com', 'senha' => password_hash('admin123', PASSWORD_DEFAULT), 'cpf' => '00000000000', 'data_nascimento' => '1980-01-01', 'tipo' => 'admin'],
            ['nome' => 'Cliente1', 'email' => 'cliente1@loja.com', 'senha' => password_hash('cliente123', PASSWORD_DEFAULT), 'cpf' => '11111111111', 'data_nascimento' => '1990-05-10', 'tipo' => 'cliente'],
            ['nome' => 'Cliente2', 'email' => 'cliente2@loja.com', 'senha' => password_hash('cliente123', PASSWORD_DEFAULT), 'cpf' => '22222222222', 'data_nascimento' => '1992-08-20', 'tipo' => 'cliente'],
        ];

        $insertUser = $db->prepare("INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento, tipo) VALUES (?, ?, ?, ?, ?, ?)");
        foreach ($usuarios as $u) {
            $check = $db->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
            $check->execute([$u['email']]);
            $existe = $check->fetchColumn();

            if ($existe == 0) {
                try {
                    $insertUser->execute([$u['nome'], $u['email'], $u['senha'], $u['cpf'], $u['data_nascimento'], $u['tipo']]);
                } catch (PDOException $e) {
                    echo "Erro ao inserir usuário: " . $e->getMessage() . "<br>";
                }
            } else {
                echo "⚠️ Usuário '{$u['email']}' já existe. Ignorado.<br>";
            }
        }


        // Inserir categorias
        $categorias = ['Eletrônicos', 'Livros', 'Roupas'];
        $insertCat = $db->prepare("INSERT INTO categorias (nome) VALUES (?)");
        foreach ($categorias as $cat) {
            try {
                $insertCat->execute([$cat]);
            } catch (PDOException $e) {
                echo "Erro ao inserir categoria: " . $e->getMessage() . "<br>";
            }
        }

        // Buscar admin id
        $stmt = $db->prepare("SELECT id FROM usuarios WHERE tipo = 'admin' LIMIT 1");
        $stmt->execute();
        $admin = $stmt->fetch();
        $admin_id = $admin ? $admin['id'] : null;

        // Buscar categorias
        $stmt = $db->query("SELECT id, nome FROM categorias");
        $categoriasArray = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

        // Inserir produtos
        $produtos = [
            ['nome' => 'Smartphone X', 'descricao' => 'Smartphone com tela 6.5 polegadas e câmera de 48MP.', 'preco' => 1500.00, 'imagem' => 'smartphone.jpg', 'categoria' => 'Eletrônicos'],
            ['nome' => 'Livro PHP Avançado', 'descricao' => 'Aprenda PHP avançado com exemplos práticos.', 'preco' => 80.00, 'imagem' => 'php-livro.jpg', 'categoria' => 'Livros'],
            ['nome' => 'Camiseta Azul', 'descricao' => 'Camiseta 100% algodão, tamanho M.', 'preco' => 35.00, 'imagem' => 'camiseta.jpg', 'categoria' => 'Roupas'],
        ];

        $insertProd = $db->prepare("INSERT INTO produtos (nome, descricao, preco, imagem, criado_por, categoria_id) VALUES (?, ?, ?, ?, ?, ?)");

        foreach ($produtos as $p) {
            $categoria_id = $categoriasArray[$p['categoria']] ?? null;
            if ($categoria_id && $admin_id) {
                try {
                    $insertProd->execute([$p['nome'], $p['descricao'], $p['preco'], $p['imagem'], $admin_id, $categoria_id]);
                } catch (PDOException $e) {
                    echo "Erro ao inserir produto '{$p['nome']}': " . $e->getMessage() . "<br>";
                }
            }
        }

        echo "<p>✅ Pré-carga executada com sucesso.</p>";
    } catch (PDOException $e) {
        echo "Erro durante a pré-carga: " . $e->getMessage();
    }
}
}