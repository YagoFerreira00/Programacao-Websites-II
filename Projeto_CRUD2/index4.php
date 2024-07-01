<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/Noticia.php';



if (!isset($_SESSION['usuario_id'])) {
    header('Location: login3.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $noticias = new Noticia($db);
    $idusu = $_SESSION['usuario_id'];
    $data = date("Y-m-d");
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $noticias->criar($idusu, $data, $titulo, $noticia);
    header('Location: index4.php');
    exit();
}
$noticias = new Noticia($db);

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login3.php');
    exit();
}
$usuario = new Usuario($db);

// Processar exclusão de usuário
if (isset($_GET['deletar'])) {
    $idnot = $_GET['deletar'];
    $noticias->deletar($id);
    header('Location: index4.php');
    exit();
}
// Obter parâmetros de pesquisa e filtros
$search = isset($_GET['search']) ? $_GET['search'] : '';
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : '';

// Obter dados dos usuários com filtros
$dados = $usuario->ler($search, $order_by);

// Obter dados do usuário logado
$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];
$idusu = $dados_usuario['id'];
// Obter dados dos usuários
$noticias = new Noticia($db);
$infon = $noticias->lerNotUsu($_SESSION['usuario_id']);

// SÓ NOTICIAS ACIMA

$usuario = new Usuario($db);

// Processar exclusão de usuário
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $usuario->deletar($id);
    header('Location: portal.php');
    exit();
}

// Obter parâmetros de pesquisa e filtros
$search = isset($_GET['search']) ? $_GET['search'] : '';
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : '';

// Obter dados dos usuários com filtros
$dados = new Usuario($db);
$infou = $dados->lerPerfUsu($_SESSION['usuario_id']);

// Obter dados do usuário logado
$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];

// Função para determinar a saudação
function saudacao() {
    $hora = date('H');
    if ($hora >= 6 && $hora < 12) {
        return "Bom dia";
    } elseif ($hora >= 12 && $hora < 18) {
        return "Boa tarde";
    } else {
        return "Boa noite";
    }
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
                    <li class="tm-nav-item"><a href="index5.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Blog Home
                        </a></li>
                        <li class="tm-nav-item active"><a href="index4.php" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Minha conta
                    </a></li>
                    <li class="tm-nav-item"><a href="logout.php" class="tm-nav-link">
                            <i class="fas fa-users"></i>
                            Logout
                        </a></li>
                </ul>
            </nav>

            <p class="tm-mb-80 pr-5 text-white">
                Site feito pelo Xiruzinho Yago Ferreira para o projeto final de Programação Web II
            </p>
        </div>
    </header>
    <h1 align="center"><?php echo saudacao() . ", " . $nome_usuario; ?></h1>
<br>

<h1 align="center">Postar Noticia</h1>
    <form align="center" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required>
        <br><br>
        <label for="noticia">Noticia:</label>
        <input type="text" name="noticia" required>
        <br><br>
        <input type="submit" value="Postar">
    </form>
    <br>
    <table border="1" align="center">
    <h1 align="center">Minhas Noticias</h1>
        <tr>
            <th>Postado por</th>
            <th>Data</th>
            <th>Titulo</th>
            <th>Notícia</th>
            <th>Ações</th>
        
        </tr>
        <?php while ($row = $infon->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td>Você</td>
                <td><?php echo $row['data']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['noticia']; ?></td>
                <td>
                    <a href="editar3.php?idnot=<?php echo $row['idnot']; ?>">Editar</a>
                    <a href="deletar2.php?idnot=<?php echo $row['idnot']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <table border="1" align="center">
    <h1 align="center">Meus Dados</h1>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Fone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $infou->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo ($row['sexo'] === 'M') ? 'Masculino' : 'Feminino'; ?></td>
                    <td><?php echo $row['fone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="editar4.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="deletar.php?id=<?php echo $row['id']; ?>">Apagar minha conta</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
            <footer class="row tm-row">
                <hr class="col-12">
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