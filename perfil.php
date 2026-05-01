<?php 
    session_start();
    require 'db/banco.php';

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login.php");
        exit;
    }

    $stmt = $conn -> prepare("SELECT nome, usuario, foto FROM usuarios WHERE id = ?");
    $stmt -> execute([$_SESSION['usuario_id']]);
    $dados = $stmt->fetch();

    $exibir_sucesso = isset($_SESSION['sucesso_perfil']);
    if ($exibir_sucesso) unset($_SESSION['sucesso_perfil']);

    $mensagem_erro = isset($_SESSION['erro_perfil']) ? $_SESSION['erro_perfil'] : null;
    if ($mensagem_erro) unset($_SESSION['erro_perfil']);

    $pagina = 'perfil';
    include 'includes/nav.php';
?>

    <main>
        <div class="banner"></div>
        <div class="user">
            <div class="img">
                <img src="<?= !empty($dados['foto']) ? 'uploads/'.$dados['foto'] : 'assets/img/avatar.jpg' ?>" id="preview">
                
                <p onclick="document.getElementById('inputFoto').click()" style="cursor:pointer">
                    <i class="fa-solid fa-pen"></i>
                </p>
            </div>
            <p><?= htmlspecialchars($dados['usuario']) ?></p>
        </div>
        
        <div class="dados">
            <form action="backend/editar_perfil.php" method="POST" enctype="multipart/form-data">
                
                <input type="file" name="foto" id="inputFoto" style="display:none" onchange="previewImage(this)">

                <label>Nome
                    <div class="input">
                        <input type="text" name="nome" id="inputNome" value="<?= htmlspecialchars($dados['nome']) ?>" readonly onblur="bloquear(this)">
                        <i class="fa-solid fa-pen" onclick="ativar('inputNome')" style="cursor:pointer"></i>
                    </div>
                </label>

                <label>Senha Atual
                    <div class="input">
                        <input type="password" name="senha_atual" id="senhaAtual" placeholder="Confirme sua senha atual" readonly onblur="bloquear(this)">
                        <i class="fa-solid fa-pen" onclick="ativar('senhaAtual')" style="cursor:pointer"></i>
                    </div>
                </label>

                <label>Nova Senha
                    <div class="input">
                        <input type="password" name="nova_senha" id="novaSenha" placeholder="Digite a nova senha" readonly onblur="bloquear(this)">
                        <i class="fa-solid fa-pen" onclick="ativar('novaSenha')" style="cursor:pointer"></i>
                    </div>
                </label>

                <div class="buttons">
                    <button type="button" class="cancel" onclick="window.location.reload()">Cancelar</button>
                    <button type="submit" id="btnSalvar" class="btn-salvar" disabled>Salvar</button>
                </div>
            </form>
        </div>

        <?php if ($mensagem_erro): ?>
            <p class="mensagem erro" style="display: flex;">
                <i class="fa-solid fa-circle-xmark"></i> <?= $mensagem_erro ?>
            </p>
        <?php elseif ($exibir_sucesso): ?>
            <p class="mensagem" style="display: flex;">
                <i class="fa-solid fa-check"></i> Alterações feitas com sucesso!
            </p>
        <?php endif; ?>

    </main>

    <script src="assets/js/editar_perfil.js"></script>

    </body>
    </html>