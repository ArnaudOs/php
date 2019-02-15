<?php

//$ma_variable= "Bonjour" en snake case
$maVariable = "Bonjour";//le point virgule en php est obligatoire. le dollar fait aprtie du nom de la variable
$monNombre = 12;
$monBoolean = true;
$monTableau = [10, 20, 30, 40];
$monTableauAssoicatif = ["nom" => "Chamla", "Prenom" => "Lior"];
//accéder à un élément d'un tableau indexé
// let element = monTableau[2];
$element = $monTableau[2];
//accéder à un élément d'un objet tableau associatif
//let prenom 

//1) const ma Constante = "Toto";
define("MA_CONSTANTE", "toto"); //On utilise pas le dollar pour la constante et la convention on écrit en majuscule le nom de la constante
// ci dessus c'est l'équivalent en PHP de al constante en javascript 1)
/*
//function additionner (x, y){
 *le  resultat = x + y;
return resultat;
}*/
function additionner($x, $y)
{
    $resultat = $x + $y;
    return $resultat;
}
$somme = additionner(10, 5);

//concatenation
//let phrase ="Bonjour" + "tout le monde";
// "Bonjour tout le monde"
$phrase = "Bonjour " . "tout le monde"; //pour concatener on utilise le point.

//interpolation
//let prenom = "Lior";
//let phrase = "Bonjour $(prenom);
$prenom = "Lior";
$phrase = "Bonjour {$prenom}";//les accolades ne sont pas obligatoires mias il faut les mettre poyur s'y retrouver
$phrase = 'Bonjour {$prenom}';

//les conditions
//let age= 32;
//let adulte = false
//if (age>=18){
//adulte = true
//}
$age = 32;
$adulte = false;
if ($age >= 18) {
    $adulte = true;
} else if ($age >= 12) {
    $adulte = false;
} else {
    $adulte = false;
}

//BOUCLES
// for=(let i=0; i<10; i++){
 //   faire une fonction
//}
for ($i = 0; $i < 10; $i++) {
    //faire une action
}

//FOR EACH
$tableau = [10, 20, 30, 40];
foreach ($tableau as $nombre) {
    // faire une action
}
// 
foreach ($tableau as $index => $nombre) {//boucle for each
    //index vaudra: 0, 1, 2, 3
    //nombre vaudra : 10 , 20, 30, 40
    // faire une action
}
//document.write("<h2>Bonjour<h/2>");
echo "<h2>Bonjour</h2>";

// console.log(MonTableau);
var_dump($monTableau);

$phrase = "Bonjour à tous";
//phrase.length pour trouver la longueur de la phrase en javascript
//phrase.toUpperCase;
//tableau.length;
//tableau.splice(2,1);
// pour une phrase en php
$longueur = strlen($phrase);
$longueur = count($monTableau);
