<?php
session_start(); 
require '../db/banco.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn -> prepare("INSERT INTO usuarios (nome, usuario, senha) VALUES (?, ?, ?)");
        $stmt -> execute([$nome, $usuario, $senha]);
        
        $_SESSION['sucesso'] = "Cadastro feito com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['erro'] = "Ocorreu um erro ao cadastrar.";
    }

    header("Location: ../cadastro.php");
    exit;
}
?>