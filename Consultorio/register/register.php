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