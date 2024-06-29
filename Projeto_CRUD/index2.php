<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';
include_once './classes/Noticia.php';



if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $noticias = new Noticia($db);
    $idusu = $_SESSION['usuario_id'];
    $data = date("Y-m-d");
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $noticias->criar($idusu, $data, $titulo, $noticia);
    header('Location: index2.php');
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Portal</title>
</head>
<a href="home.php">Voltar</a><br><br>
<a href="logout.php">Logout</a>
<body>
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
                    <a href="editar2.php?idnot=<?php echo $row['idnot']; ?>">Editar</a>
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
                        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="deletar.php?id=<?php echo $row['id']; ?>">Apagar minha conta</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        
</body> </html>