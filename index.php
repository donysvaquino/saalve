<?php 
    $pagina = 'home';
    include 'includes/pop_up.php';
    include 'includes/nav.php';
    session_start();

    if (!isset($_SESSION['usuario_id']) || $_SESSION['autorizado'] != 1) {

        header("Location: login.php");
        exit;
    };
?>

    <main>
        <div class="superior">
            <div class="textos">
                <span class="viva">Viva.</span>
                <span class="escolha">Escolha.</span>
                <span class="salve">Salve.</span>
            </div>

            <div class="img1"></div>
            <div class="img2"></div>
        </div>
        <h1>saalve</h1>
        <div class="inferior">
            <p>Bem-vindo ao saalve. A câmera que capta todos os seus momentos para que você possa vivê-los com intensidade sem perder os closes.</p>
            <a href="fotos.php">explorar</a>
        </div>
    </main>
    
</body>
</html>