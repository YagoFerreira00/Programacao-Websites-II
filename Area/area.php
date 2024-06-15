<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de áreas</title>
</head>

<body class="back-85">
    <br><br><div style="text-align: center" class="header-85">
        <h1>CALCULADORA DE ÁREAS 📏</h1>
    </div>
    <br><br><br><br><div style="text-align: center;" class="container-85">
        <h2>Calculadora de áreas</h2>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="forma">Escolha a forma:</label>
        <select name="forma" id="forma" required>
            <option value="">Selecione uma opção...</option>
            <option value="retangulo">Retângulo</option>
            <option value="triangulo">Triângulo</option>
            <option value="circulo">Círculo</option>
        </select><br>

        <br><label for="largura">Largura (para retângulo):</label>
        <input type="number" name="largura" id="largura"><br>

        <br><label for="altura">Altura (para retângulo ou triângulo):</label>
        <input type="number" name="altura" id="altura"><br>

        <br><label for="base">Base (para triângulo):</label>
        <input type="number" name="base" id="base"><br>

        <br><label for="raio">Raio (para círculo):</label>
        <input type="number" name="raio" id="raio"><br>

        <br><button class="button-85" type="submit" role="button">Calcular</button>
    </form>


        <br>
        <div class="resposta">
        <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $forma = $_POST['forma'];
    $largura = $_POST['largura'] ?? null;
    $altura = $_POST['altura'] ?? null;
    $base = $_POST['base'] ?? null;
    $raio = $_POST['raio'] ?? null;
    $area = 0;


    switch ($forma) {
        case 'retangulo':
            $area = $largura * $altura;
            break;
        case 'triangulo':
            $area = $base * $altura / 2;
            break;
        case 'circulo':
            $area = pi() * pow($raio, 2);
            break;
        default:
            $area = "Por favor, selecione uma forma válida.";
    }

    echo "Área do(a) {$forma}: " . number_format($area, 2, ',', '.') . "m²";
}
?>

        </div>
    </div>
    <div style="text-align: center; color: white;">
    <footer>
    <span class="texto-rgb-brilhante">Copyright © Yago Ferreira 2024</span>
        </footer>
    </div>
</body>

</html>