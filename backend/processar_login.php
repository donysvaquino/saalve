<?php
session_start();
require '../db/banco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];

    // Busca o usuário no banco
    $stmt = $conn->prepare("SELECT id, senha, autorizado FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch();

    // password_verify compara a senha digitada com o hash guardado no banco
    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['autorizado'] = $user['autorizado'];
        header("Location: ../index.php");
        exit;
    } else {
        $_SESSION['erro'] = "Usuário ou senha incorretos!";
        header("Location: ../login.php");
        exit;
    }
}
?>