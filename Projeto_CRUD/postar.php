<?php
session_start();
include_once './config/config.php';
include_once './classes/Noticia.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $noticias = new Noticia($db);
    $idusu = $_SESSION['usuario_id'];
    $data = date("Y-m-d");
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $noticias->criar($idusu, $data, $titulo, $noticia);
    header('Location: portal2.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Postar Noticia</title>
</head>
<a href="logout.php">Logout</a>
<a href="portal.php">Usuarios</a>
<a href="portal2.php">Notícias</a>
<body>
    <h1>Postar Noticia</h1>
    <form method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required>
        <br><br>
        <label for="noticia">Noticia:</label>
        <input type="text" name="noticia" required>
        <br><br>
        <input type="submit" value="Postar">
    </form>
</body>
</html>