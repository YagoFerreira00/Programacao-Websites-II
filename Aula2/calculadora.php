<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="header">
    <img src='mclogo.png' style='width: 500px;'>    
    <h1>CALCULADORA IMC</h1>
    </div>
    <div class="container">
        <form action="calculadora.php" method="POST">
            <label for="nome">Nome: </label>
            <input type="letter" id="nome" name="nome" step="0.1" required><br><br>

            <label for="peso">Peso(Kg): </label>
            <input type="number" id="peso" name="peso" step="0.1" required><br><br>

            <label for="altura">Altura(m): </label>
            <input type="number" id="altura" name="altura" step="0.01" required><br><br>

            <label for="nascimento">Ano Nascimento: </label>
            <input type="number" id="anoNascimento" name="anoNascimento" step="0.01" required><br><br>

            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar">
        </form>
        <div class="resposta">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['peso']) && isset($_POST['altura'])) {
                    $peso = $_POST['peso'];
                    $altura = $_POST['altura'];
                    $nome = $_POST['peso'];
                    $anoNascimento = $_POST['altura'];
                    $erro = empty($peso) || empty($altura) ? "Preencha todos os campos!" : ((!is_numeric($altura) || $peso <= 0 || $altura <= 0) ? "Insira valores válido" : "");
                    if ($erro) {
                        echo $erro;
                    } else {
                        $imc = $peso / ($altura * $altura);
                        $imc = number_format($imc, 2);
                        $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso Normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                        echo "Seu imc é: $imc<br>";
                        echo "Sua classificação é: $classificacao";
                    }
                } else {
                    echo "<br>Formulário não enviado corretamente";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>