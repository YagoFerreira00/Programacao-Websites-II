<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
</head>

<body>
    <div class="header">
        <img src='mclogo.png' style='width: 500px;'>
        <h1>CONVERSOR DE TEMPERATURA 🌡️</h1>
    </div>
    <div style="text-align: center;" class="container">
        <h2>Conversor de temperatura</h2>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="temperatura">Temperatura:</label>
            <input type="number" name="temperatura" id="temperatura" required><br>

            <br><label for="escala">Converter para:</label>
            <select name="escala" id="escala" required>
                <option value="">Selecione uma opção...</option>
                <option value="celsius">Celsius</option>
                <option value="fahrenheit">Fahrenheit</option>
            </select><br>

            <br>
            <button class="button-59" type="submit" role="button">Converter</button>
        </form>

        <br>
        <div class="resposta">
            <?php

            function celsiusParaFahrenheit($temperatura)
            {
                return $temperatura * 9 / 5 + 32;
            }


            function fahrenheitParaCelsius($temperatura)
            {
                return ($temperatura - 32) * 5 / 9;
            }


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $temperatura = $_POST['temperatura'];
                $escala = $_POST['escala'];


                if ($escala == 'celsius') {
                    $temperaturaConvertida = celsiusParaFahrenheit($temperatura);
                    $escalaOriginal = 'Celsius';
                    $escalaConvertida = 'Fahrenheit';
                } elseif ($escala == 'fahrenheit') {
                    $temperaturaConvertida = fahrenheitParaCelsius($temperatura);
                    $escalaOriginal = 'Fahrenheit';
                    $escalaConvertida = 'Celsius';
                } else {
                    $temperaturaConvertida = 'Escolha uma escala válida.';
                }

                echo "Temperatura Original: {$temperatura}°{$escalaOriginal}<br>";
                echo "Temperatura Convertida: {$temperaturaConvertida}°{$escalaConvertida}";
            }
            ?>


        </div>
    </div>
</body>

</html>