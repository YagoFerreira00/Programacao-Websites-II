<?php
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/Noticia.php';




$noticias = new Noticia($db);

$usuario = new Usuario($db);

// Processar exclusão de usuário
if (isset($_GET['deletar'])) {
    $idnot = $_GET['deletar'];
    $noticias->deletar($id);
    header('Location: portal.php');
    exit();
}
$dados = $noticias->ler();
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
<a href="login.php">Login</a><br>
<body>
    <h1 align="center"><?php echo saudacao() . ", " ?><br>Aqui estão todas as notícias!</h1>
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