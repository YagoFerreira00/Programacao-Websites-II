<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
</head>

<body class="back-85">
    <br><br><div style="text-align: center" class="header-85">
        <h1>CALCULADORA DE GORJETA 💁‍♂️💸</h1>
    </div>
    <br><br><br><br><div style="text-align: center;" class="container-85">
        <h2>Calculadora de Gorjeta</h2>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="valor_conta">Valor da Conta (R$):</label>
            <input type="text" name="valor_conta" id="valor_conta" required><br>

            <br><label for="percentagem_gorjeta">Percentagem de Gorjeta (%):</label>
            <input type="text" name="percentagem_gorjeta" id="percentagem_gorjeta" required><br>

            <br><button class="button-85" type="submit" role="button" name="calcular">Calcular</button>
            <button class="button-85" type="reset" role="button">Limpar</button>
        </form>


        <br><div class="resposta">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (isset($_POST['calcular'])) {
                    $valorConta = $_POST['valor_conta'];
                    $percentagemGorjeta = $_POST['percentagem_gorjeta'];


                    $gorjeta = $valorConta * ($percentagemGorjeta / 100);
                    $totalPagar = $valorConta + $gorjeta;

                    echo "Valor da Conta: R$ " . number_format($valorConta, 2, ',', '.') . "<br>";
                    echo "Percentagem de Gorjeta: " . $percentagemGorjeta . "%<br>";
                    echo "Valor da Gorjeta: R$ " . number_format($gorjeta, 2, ',', '.') . "<br>";
                    echo "Total a Pagar: R$ " . number_format($totalPagar, 2, ',', '.');
                }

                if (isset($_POST['limpar'])) {
                    $_POST = array();
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