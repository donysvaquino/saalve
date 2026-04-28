<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/public.css">
    <title>Saalve</title>

<style>
    .area {
        width: 100%;
        height: 100vh;
        position: absolute;
        z-index: 3;
        display: flex;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(3px);
    }

    .card {
        width: 30vw;
        background-color: var(--branco);
        border-radius: 20px;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        gap: 10px;

        & h1 {
            position: absolute;
            top: 20px;
            right: 25px;
        }
    }

    .buttons {
        display: flex;
        width: 100%;
        margin-top: 3vh;
        justify-content: space-between;

        & button {
            background: var(--gradiente);
            width: 48%;
            height: 7vh;
            padding: 0px 20px 0 20px;
            font-size: 17px;
            font-weight: bold;
            border-radius: 15px;
            cursor: pointer;
            border: none;
        }

        & button.cancel {
            background: #363D4E;
            border: none;
            font-weight: 500;
            color: var(--branco);
        }
    }
</style>

</head>
<body>
    <div class="area">
        <div class="card">
            <h1><i class="fa-solid fa-xmark"></i></h1>
            <h3>Tem certeza disso?</h3>
            <p>Você realmente deseja desconectar-se de sua conta saalve?</p>
            <div class="buttons">
                <button class="cancel">Cancelar</button>
                <button>Sair</button>
            </div>
        </div>
    </div>
</body>
</html>