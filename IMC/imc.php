<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
</head>

<body class="back-85">
    <br><br><div style="text-align: center" class="header-85">
        <h1>CALCULADORA IMC ⚖️</h1>
    </div>
    <br><br><br><br><div style="text-align: center;" class="container-85">
        <h2>Calculadora IMC</h2>
        <br>
        <form action="" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="peso">Peso(Kg): </label>
            <input type="number" id="peso" name="peso" step="0.1" required><br><br>

            <label for="altura">Altura(m): </label>
            <input type="number" id="altura" name="altura" step="0.01" required><br><br>

            <label for="dataNasc">Ano de nascimento: </label>
            <input type="number" id="dataNasc" name="dataNasc" required>

            <br><br><button class="button-85" type="submit" role="button">Calcular IMC</button>
            <button class="button-85" type="reset" role="button">Limpar</button>
            

        </form>

        <div class="resposta">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['nome']) && isset($_POST['dataNasc'])) {
                    $peso = $_POST['peso'];
                    $altura = $_POST['altura'];
                    $nome = $_POST['nome'];
                    $dataNasc = $_POST['dataNasc'];

                    $erro =  empty($nome) || empty($peso) || empty($altura) || empty($dataNasc) ? "Preencha todos os campos!" : ((!is_numeric($altura) || $peso <= 0 || $peso > 500 || $altura <= 0 || $altura > 3 || $dataNasc <= 1924 || $dataNasc > 2024) ? "Insira valores válido" : "");
                    if ($erro) {
                        echo $erro;
                    } else {
                        $imc = $peso / ($altura * $altura);
                        $imc = number_format($imc, 2);
                        $anoAtual = date('Y');
                        $idade = $anoAtual - $dataNasc;

                        $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso Normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                        echo "<br>$nome com idade de $idade anos, seu imc é $imc e sua classificação é $classificacao";
                    }
                } else {
                    echo "Formulário não enviado corretamente";
                }
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