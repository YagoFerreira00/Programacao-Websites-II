<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Noticia.php';


$noticias = new Noticia($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idnot = $_POST['idnot'];
    $idusu = $_SESSION['usuario_id'];
    $data = date("Y-m-d");
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $noticias->atualizar($idusu, $data, $titulo, $noticia,$idnot);
    header('Location: index2.php');
    exit();
}
if (isset($_GET['idnot'])) {
    $id = $_GET['idnot'];
    $row = $noticias->lerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Postagem</title>
</head>
<body>
<header>
        <nav>
            <a href="index2.php">Voltar</a><br><br>
            <a href="home.php">Noticias</a><br><br>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <h1>Editar Postagem</h1>
    <form method="POST">
        <input type="hidden" name="idnot" value="<?php echo $row['idnot']; ?>">
        <label for="nome">Titulo:</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
        <br><br>
        <label for="fone">Noticia:</label>
        <input type="text" name="noticia" value="<?php echo $row['noticia']; ?>" required>
        <br><br>
        <input type="submit" value="atualizar">
    </form>
</body>
</html>