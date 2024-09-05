<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/53-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/js/53-functions.js"></script>
    <title>ERPL</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="container-logo">
                <a href="/">
                    <img src="/assets/images/ERP_logo1.png" class="logo">
                </a>
            </div>
            <div class="container-titulo">
                <h1>ERPL - Login</h1>
            </div>
        </div>
        <div class="container-menu">
            <div class="topnav" id="myTopnav">
                <a href="javascript:void(0);" class="icon" onclick="showHideMobMenu()">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="/login" class="active">Login</a>
                <a href="/cadastro-usuario">Cadastro</a>
            </div>
        </div>
    </header>

    <main>
        <div>
            <form class="form-acesso" method="post">
                <label for="login">Login</label>
                <input id="login" name="login" placeholder="Insira o login">

                <label for="senha">Senha</label>
                <input id="senha" name="senha" placeholder="Insira a senha"
                       type="password"
                >

                <button class="bt-53" id="bt_login" type="submit">Login</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Mobdev Ufopa</p>
    </footer>
</body>
</html>