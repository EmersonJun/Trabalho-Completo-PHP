<?php 
    class AuthController {
    private $usuarioModel;
    public function __construct() {
        $this->usuarioModel = new Usuario();
    }
    public function login($cpf, $dataNascimento) {
        session_start();
        $user = $this->usuarioModel->autenticar($cpf, $dataNascimento);
        if ($user) {
            $_SESSION['usuario'] = $user;
            return true;
        }
        return false;
    }
    public function logout() {
        session_start();
        session_destroy();
        }
    }
?>