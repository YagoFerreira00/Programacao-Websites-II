<?php
$premio = "McLaren 570S REBAIXADA";
$valor = 10.00;
$quantNum = 570;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa</title>
</head>

<body>
    <div class="header">
    <img src='mclogo.png' style='width: 500px;'>
        <h1>RIFA FAVELA VENCEU 🤑🍀</h1>
    </div>
    <div class="container">

        <?php
        $cont = 1;
        while ($cont != $quantNum + 1) {
            echo "<table> <td style='border: 1px solid black; border-right: 2px dashed black ; padding-left: 10px; padding-right: 150px;'>
                            <h4 style='height: 100px'>n°: $cont </h4>
                            
                            <h4 style='height: 30px'>Nome: </h4>
                             
                            <h4 style='height: 30px'>Telefone: </h4>
                             
                            <h4 style='height: 30px'>E-mail: </h4>
                        </td>
                        <td style='border: 1px solid black; border-left: 2px dashed black;'>
                            <h4 style='height: 20px'>Ó PAI SÓ GRATIDÃO 🙏</h4>
                             <br>
                            <h4 style='height: 30px'>$premio </h4>
                             <br>
                            <h4 style='height: 30px'>Valor: R$ $valor <br></h4> 
                           <h4 style='height: 30px'> n°: $cont <br></h4>
                        </td> 
                        <td style='border: 1px solid black;'>
                        <img src='mclaren.jpg' style='width: 300px;' >
                        </td>
                        </table> <br>";
            $cont++;
        }
        ?>

    </div>
    <div style="text-align: center; color: black;">
        <footer>
            <p>Desenvolvido por Yago Ferreira@2024</p>
        </footer>
    </div>
</body>

</html>