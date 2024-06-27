<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/Noticia.php';



if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
$noticias = new Noticia($db);

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
$usuario = new Usuario($db);

// Processar exclusão de usuário
if (isset($_GET['deletar'])) {
    $idnot = $_GET['deletar'];
    $noticias->deletar($id);
    header('Location: portal.php');
    exit();
}
// Obter dados do usuário logado
$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];
// Obter dados dos usuários
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
<a href="logout.php">Logout</a>
<a href="portal.php">Usuarios</a>
<a href="portal2.php">Notícias</a>
<body>
    <h1><?php echo saudacao() . ", " . $nome_usuario; ?> <br>Bem-vindo ao Portal de Notícias!</h1>
    <a href="postar.php">Postar Notícia</a>
<br>
    <table border="1">
        <tr>
            <th>Postado por</th>
            <th>Data</th>
            <th>Titulo</th>
            <th>Notícia</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['idusu']; ?></td>
                <td><?php echo $row['data']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['noticia']; ?></td>
                <td>
                    <a href="editar2.php?idnot=<?php echo $row['idnot']; ?>">Editar</a>
                    <a href="deletar2.php?idnot=<?php echo $row['idnot']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body> </html>