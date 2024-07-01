<?php
include_once './config/config.php';
include_once './classes/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario($db);
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario->criar($nome, $sexo, $fone, $email, $senha);
    header('Location: index3.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiruzão News</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
</head>

<body>
    <header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
                <h1 class="text-center">Xiruzão News</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">
                <ul>
                    <li class="tm-nav-item"><a href="index3.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Blog Home
                        </a></li>
                    <li class="tm-nav-item active"><a href="login3.php" class="tm-nav-link">
                            <i class="fas fa-users"></i>
                            Login
                        </a></li>

                </ul>
            </nav>
            <p class="tm-mb-80 pr-5 text-white">
                Site feito pelo Xiruzinho Yago Ferreira para o projeto final de Programação Web II
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <div class="row tm-row tm-mb-120">
                <div class="col-12">
                    <h2 class="tm-color-primary tm-post-title tm-mb-60">Criar conta</h2>
                </div>
                <div class="col-lg-7 tm-contact-left">
                <form method="POST" action="" class="mb-5 ml-auto mr-0 tm-contact-form">                        
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">Nome</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="nome" id="nome" type="text" required>                            
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">Sexo</label>
                            <div class="col-sm-9">
                            <input type="radio" id="masculino" name="sexo" value="M" required> Masculino
                            <input type="radio" id="feminino" name="sexo" value="F" required> Feminino                          
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="email" class="col-sm-3 col-form-label text-right tm-color-primary">Fone</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="fone" id="fone" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Email</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="email" id="email" type="email" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Senha</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="senha" id="senha" type="password" required>
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <button class="tm-btn tm-btn-primary tm-btn-small">Cadastrar</button>                        
                            </div>                            
                        </div>                                
                    </form>
                </div>

                <footer class="row tm-row">
                    <div class="col-md-6 col-12 tm-color-gray">
                        Design: <a rel="nofollow" target="_parent" href="https://github.com/yagoferreira00" class="tm-external-link">Yago Ferreira</a>
                    </div>
                    <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                        Copyright 2024 Yago Ferreira.
                    </div>
                </footer>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>