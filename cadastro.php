<?php
    session_start();
    $msg_sucesso = $_SESSION['sucesso'] ?? null;
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
    <link rel="stylesheet" href="assets/css/cadastro.css">
</head>
<body>
    <main>
        <div class="pattern"></div>
        <div class="container">
            <form action="backend/processar_cadastro.php" method="POST">
                <h1>saalve</h1>
                <p><span>Bem-vindo ao saalve!</span> Cadastre-se para salvar suas fotos.</p>

                <label> Nome <input type="text" name="nome" placeholder="Francisco de Sales..." required></label>
                <label> Usuário <input type="text" name="usuario" placeholder="franciscosales@email.com..." required></label>
                <label> Senha <input type="password" name="senha" placeholder="Senha..." required></label>
                <button type="submit">Cadastrar-se</button>
            </form>
            <p class="alterar">Já possui uma conta? <a href="login.php">Faça login</a></p>
            <p class="mensagem sucesso" style="display: <?= $msg_sucesso ? 'flex' : 'none' ?>;">
                <i class="fa-solid fa-check"></i> <?= htmlspecialchars($msg_sucesso) ?>
            </p>

            <p class="mensagem erro" style="display: <?= $msg_erro ? 'flex' : 'none' ?>;">
                <i class="fa-solid fa-circle-xmark"></i> <?= htmlspecialchars($msg_erro) ?>
            </p>
        </div>  
    </main>
</body>
</html>