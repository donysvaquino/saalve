<?php
    session_start();
    $msg_erro = $_SESSION['erro'] ?? null;

    unset($_SESSION['sucesso'], $_SESSION['erro']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saalve</title>

    <script src="https://kit.fontawesome.com/f4abea6276.js" crossorigin="anonymous"></script>  

    <link rel="stylesheet" href="assets/css/public.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <main>
        <div class="pattern"></div>
        <div class="container">
            <form action="backend/processar_login.php" method="POST">
                <h1>saalve</h1>
                <p><span>Bem-vindo de volta!</span> Por favor, entre em sua conta.</p>

                <label> Usuário <input type="text" name="usuario" required></label>
                <label> Senha <input type="password" name="senha" required></label>
                <button type="submit">Entrar</button>
            </form>
            <p class="alterar">Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>

            <p class="mensagem erro" style="display: <?= $msg_erro ? 'flex' : 'none' ?>;">
                <i class="fa-solid fa-circle-xmark"></i> <?= htmlspecialchars($msg_erro) ?>
            </p>
        </div>
    </main>
</body>
</html>