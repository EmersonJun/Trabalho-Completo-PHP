<?php
require_once '../config/db.php';
require_once '../models/Produto.php';
require_once '../controllers/ProdutoController.php';
$controller = new ProdutoController();
$controller->mostrarHome();
?>