<?php
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/Noticia.php';




$noticias = new Noticia($db);

$usuario = new Usuario($db);


// Obter parâmetros de pesquisa e filtros
$search = isset($_GET['search']) ? $_GET['search'] : '';
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : '';

$dados = $noticias->ler($search, $order_by);
// Função para determinar a saudação

function saudacao()
{
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
                    <li class="tm-nav-item active"><a href="index3.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Blog Home
                        </a></li>
                    <li class="tm-nav-item"><a href="login3.php" class="tm-nav-link">
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
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">
                        <input class="form-control tm-search-input" type="text" name="search" placeholder="Pesquisar por título ou notícia" value="<?php echo htmlspecialchars($search); ?>">
                        <div class="container">
                            <div class="custom-radio">
                                <div class="container">
                                    <div class="custom-radio">
                                        <input type="radio" id="radio-1" name="order_by" value="" <?php if ($order_by == '') echo 'checked'; ?>>
                                        <label class="radio-label" for="radio-1">
                                            <div class="radio-circle"></div>
                                            <span class="radio-text">Normal</span>
                                        </label>
                                        <input type="radio" id="radio-2" name="order_by" value="titulo" <?php if ($order_by == 'titulo') echo 'checked'; ?>>
                                        <label class="radio-label" for="radio-2">
                                            <div class="radio-circle"></div>
                                            <span class="radio-text">Ordem Alfabética</span>
                                        </label>
                                        <input type="radio" id="radio-3" name="order_by" value="data" <?php if ($order_by == 'data') echo 'checked'; ?>>
                                        <label class="radio-label" for="radio-3">
                                            <div class="radio-circle"></div>
                                            <span class="radio-text">Data</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button align="center" class="tm-search-button" type="submit">
                                <i align="center" class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                            </button>
                    </form>
                </div>

                <div><?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
                        <table style='width:90%;' border="1" align="center">
                            <tr>
                                <th>Postado por: <?php echo $row['usuario']; ?></th>
                                <th><?php echo $row['data']; ?></th>

                            </tr>
                        </table>
                        <table style='width:90%;' border="1" align="center">
                            <tr>
                                <td style='text-align: center' ;><strong><?php echo $row['titulo']; ?></strong></td>
                            </tr>
                            <tr>
                                <td><?php echo $row['noticia']; ?></td>
                            </tr>
                        </table><br><br>
                    <?php endwhile; ?>

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