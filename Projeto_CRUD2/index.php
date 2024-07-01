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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Portal</title>
</head>
<a href="index2.php">Portal</a><br><br>
<a href="login.php">Login</a>
<body>
    <h1 align="center"><?php echo saudacao() . " " ?><br>Aqui estão todas as notícias!</h1>
<br>
    <!-- INCORPORADO UM FORMULARIO PARA FAZER O FILTRO -->
    <form align="center" method="GET">
            <input type="text" name="search" placeholder="Pesquisar por nome ou email" value="<?php echo htmlspecialchars($search); ?>">
            <label>
                <input type="radio" name="order_by" value="" <?php if ($order_by == '') echo 'checked'; ?>> Normal
            </label>
            <label>
                <input type="radio" name="order_by" value="titulo" <?php if ($order_by == 'titulo') echo 'checked'; ?>> Ordem Alfabética
            </label>
            <label>
                <input type="radio" name="order_by" value="data" <?php if ($order_by == 'data') echo 'checked'; ?>> Data
            </label>
            <br>
            <button type="submit">Pesquisar</button>
        </form>
<br>
    <table border="1" align="center">
        <tr>
            <th>Postado por</th>
            <th>Titulo</th>
            <th>Notícia</th>
            <th>Data</th>
        
        </tr>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['usuario']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['noticia']; ?></td>
                <td><?php echo $row['data']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body> </html>