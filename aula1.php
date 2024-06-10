<?php //iniciar php

echo "<h1>Hello</h1>"; //saída

$nome = "Yago"; //variável
$anoNasc = 2000; //variável
$idade = 2024 - $anoNasc; //variável + calculo idade
$peso = 120.0;
$altura = 1.4;
$imc = $peso / pow($altura, 2);





var_dump($nome); //mostra o valor da variável
var_dump($anoNasc);
var_dump($idade);
var_dump($peso);


echo "<br><br>$nome"; //aspas duplas indentifica variável junto com a string

echo '<br>$nome'; //aspas simples não indentifica variável

echo '<br>Boa noite, ' . $nome . ' bão?'; //forma certa de concatenar com aspas simples

echo "<br>Boa noite, $nome. C ta bão $nome?"; //forma certa de concatenar com aspas duplas
//Dentro de aspas duplas terá aspas simples


echo "<br><br><br><br>Nome:  $nome <br>";
echo "Nascido em $anoNasc<br>";
echo "$nome tem $idade anos<br><br>";

if ($idade >= 18) {
    echo "$nome, você é maior de idade!<br><br>";
} else {
    echo "$nome, você é menor de idade!<br><br>";
}

//comentario
/*comentario*/
#comentario

if ($imc < 18.5) {
    echo "$nome, tu ta um palito nego kkk vamo cume karai";
} else if ($imc >= 18.5 && $imc < 24.9) {
    echo "$nome, ta suave pai";
} else if ($imc >= 25 && $imc <= 29.9) {
    echo "$nome, deixa um poko pros otro ae poha";
} else if ($imc >= 30 && $imc <= 34.9) {
    echo "$nome, chega pai";
} else if ($imc >= 35 && $imc <= 39.9) {
    echo "$nome, pqp";
} else {
    echo "$nome, ja pode ser considerado planeta pai";
}


$op = 6;
switch ($op) {
    case 1:
        echo "<br><br>Domingo";
        break;
    case 2:
        echo "<br><br>Segunda";
        break;
    case 3:
        echo "<br><br>Terça";
        break;
    case 4:
        echo "<br><br>Quarta";
        break;
    case 5:
        echo "<br><br>Quinta";
        break;
    case 6:
        echo "<br><br>Sexta";
        break;
    case 7:
        echo "<br><br>Sábado";
        break;
    default:
        echo "<br><br>Dia da semana inválida";
}