<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de moedas</title>
</head>

<body>
    <div class="header">
        <img src='mclogo.png' style='width: 500px;'>
        <h1>CONVERSOR DE MOEDAS 💴💵💶</h1>
    </div>
    <div style="text-align: center;" class="container">
        <h2>Conversor de moedas</h2>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" required><br>

            <br><label for="converter_de">Converter de:</label>
            <select name="converter_de" id="converter_de" required>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="BRL">BRL</option>
            </select><br>

            <br><label for="converter_para">Converter para:</label>
            <select name="converter_para" id="converter_para" required>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="BRL">BRL</option>
            </select><br>
            <br><button class="button-59" type="submit" role="button">Converter</button><br>
        </form>



        <br>
        <div class="resposta">
            <?php

            $taxasDeCambio = [
                'USD_BRL' => 5.25,
                'USD_EUR' => 0.85,
                'EUR_USD' => 1.18,
                'EUR_BRL' => 6.19,
                'BRL_USD' => 0.19,
                'BRL_EUR' => 0.16,
                'BRL_BRL' => 1,
                'USD_USD' => 1,
                'EUR_EUR' => 1,
            ];

            function converterMoeda($valor, $de, $para)
            {
                global $taxasDeCambio;
                $chave = "{$de}_{$para}";
                if (array_key_exists($chave, $taxasDeCambio)) {
                    return $valor * $taxasDeCambio[$chave];
                } else {
                    return "Taxa de câmbio não definida.";
                }
            }


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $valor = $_POST['valor'];
                $converter_de = $_POST['converter_de'];
                $converter_para = $_POST['converter_para'];


                $valor_convertido = converterMoeda($valor, $converter_de, $converter_para);
                echo "Valor Convertido: " . number_format($valor_convertido, 2, ',', '.');
            }
            ?>

        </div>
    </div>
</body>

</html>