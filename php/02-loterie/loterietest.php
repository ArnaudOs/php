<?php 
function numberRandom()
{
    $myArray = [];
    for ($i = 0; $i < 6; $i++) {
        $number = rand(1, 49);
        $myArray[] = $number;
    }
    return $myArray;
}
var_dump(numberRandom());
$newArray = numberRandom();
sort($newArray);
var_dump($newArray);
// function nombresRandom(){
//     // je declare une variable qui represente un tableau
//     $monTableau = [];
// //je fais une boucle pour avoir six fois la même action
//     for ($i = 0; $i < 6; $i++) {
//     //je declare une variable qui contient un nombre aléatoire de 1 à 49
//         $testRandom = rand(1, 49);
//     //j'ajoute dans le tableau le nombre déclaré dans la variable
//         $monTableau[] = $testRandom;
//     }

//     return $monTableau;
// }
// var_dump(nombresRandom());
// ?>
