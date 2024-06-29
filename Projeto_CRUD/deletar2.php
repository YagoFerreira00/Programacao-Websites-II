<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Noticia.php';


$noticia = new Noticia($db);
if (isset($_GET['idnot'])) {
    $idnot = $_GET['idnot'];
    $noticia->deletar($idnot);
    header('Location: index2.php');
    exit();
}
?>