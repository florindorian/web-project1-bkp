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
                <h1>Cadastro de Usuário</h1>
            </div>
        </div>
        <div class="container-menu">
            <div class="topnav" id="myTopnav">
                <a href="javascript:void(0);" class="icon" onclick="showHideMobMenu()">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="/logout">Logout</a>
                <a href="/login">Login</a>
                <a href="/cadastro-usuario" class="active">Cadastro</a>
            </div>
        </div>
    </header>

    <main>
        <div>
            <form class="form-acesso" method="post">
                <label for="id_func">ID do Funcionário</label>
                <input id="id_func" name="id_func" placeholder="Insira o id do funcionário">

                <label for="login">Login</label>
                <input id="login" name="login" placeholder="Insira o login">

                <label for="nome">Nome</label>
                <input id="nome" name="nome" placeholder="Insira o nome">

                <label for="email">E-mail</label>
                <input id="email" name="email" placeholder="Insira o e-mail"
                       type="email"
                >

                <label for="nivel">Nivel</label>
                <input id="nivel" name="nivel" placeholder="Insira o nivel">

                <label for="senha">Senha</label>
                <input id="senha" name="senha" placeholder="Insira a senha"
                       type="password"
                >

                <label for="senha_conf">Confirmar senha</label>
                <input id="senha_conf" name="senha_conf" placeholder="Insira a senha novamente"
                       type="password"
                >

                <button class="bt-53" id="bt_cadastrar" type="submit">Cadastrar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Mobdev Ufopa</p>
    </footer>

</body>
</html>