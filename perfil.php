<?php 
    $pagina = 'perfil';
    include 'includes/nav.php'
?>

<main>
    <div class="banner"></div>
    <div class="user">
        <div class="img">
            <img src="assets/img/avatar.jpg" alt="">
            <p><i class="fa-solid fa-pen"></i></p>
        </div>
        <p>usuario@sobrenome</p>
    </div>
    
    <div class="dados">
        <form action="">
            <label for="">Nome
                <div class="input">
                    <input type="text" name="nome" placeholder="Usuário Sobrenome">
                    <i class="fa-solid fa-pen"></i>
                </div>
            </label>

            <label for="">Senha
                <div class="input">
                    <input type="password" name="nome" placeholder="*********">
                    <i class="fa-solid fa-pen"></i>
                </div>
            </label>
            <div class="buttons">
                <button class="cancel">Cancelar</button>
                <button>Salvar</button>
            </div>
        </form>
        
    </div>
    <p class="mensagem"><i class="fa-solid fa-check"></i> Alterações feitas com sucesso!</p>

</main>
</body>
</html>