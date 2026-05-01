<?php
session_start();
require '../db/banco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['usuario_id'];
    $nome = $_POST['nome'];
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];

    $stmt = $conn -> prepare("SELECT senha FROM usuarios WHERE id = ?");
    $stmt -> execute([$id]);
    $user = $stmt -> fetch();

    if (!empty($senha_atual) || !empty($nova_senha)) {
        
        if (empty($senha_atual) || empty($nova_senha)) {
            $_SESSION['erro_perfil'] = "Preencha os dois campos de senha!";
            header("Location: ../perfil.php");
            exit;
        }

        if (!password_verify($senha_atual, $user['senha'])) {
            $_SESSION['erro_perfil'] = "Senha atual incorreta!";
            header("Location: ../perfil.php");
            exit;
        }

        $novaSenhaHash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $stmt = $conn -> prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
        $stmt -> execute([$novaSenhaHash, $id]);
    }

    $stmt = $conn -> prepare("UPDATE usuarios SET nome = ? WHERE id = ?");
    $stmt -> execute([$nome, $id]);

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeFoto = md5(uniqid()) . "." . $extensao;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/" . $nomeFoto)) {
            $stmt = $conn -> prepare("UPDATE usuarios SET foto = ? WHERE id = ?");
            $stmt -> execute([$nomeFoto, $id]);
        }
    }

    $_SESSION['sucesso_perfil'] = true;
    header("Location: ../perfil.php");
    exit;
}