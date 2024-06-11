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
    <h1>CONVERSOR DE MOEDA</h1>
    </div>
    <div style="text-align: center;" class="container">
        <h2>Conversor de moeda </h2>
        <br>
        <form action="" method="POST">

            <label for="valor">Valor: </label>
            <input type="number" id="valor" name="valor" step="0.01" required><br><br>

            <label for="altura">Converter de: </label>
            <select name="de" id="de"></select>
            <option value="USD"></option>
            <option value="EUR"></option>
            <option value="BRL"></option>

            <label for="dataNasc">Converter para: </label>
            <select name="para" id="para"></select>
            <option value="USD"></option>
            <option value="EUR"></option>
            <option value="BRL"></option>

            <input type="submit" value="Converter">
            <input type="reset" value="Limpar">
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
</body>

</html>
