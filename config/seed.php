<?php
require_once 'db.php'; // Isso já chama getConnection() que invoca preCarga()
DB::getConnection();
echo "Pré-carga executada com sucesso.";
?>
