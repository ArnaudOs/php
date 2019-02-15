<?php 
// $testRandom = rand(1, 49);
// echo ($testRandom);


function nombresRandom()
{
    // je declare une variable qui represente un tableau
    $monTableau = [];
//je fais une boucle pour avoir six fois la même action
    for ($i = 0; $i < 6; $i++) {
    //je declare une variable qui contient un nombre aléatoire de 1 à 49
        $testRandom = rand(1, 49);
    //j'ajoute dans le tableau le nombre déclaré dans la variable
        $monTableau[] = $testRandom;
    }

    return $monTableau;
}
var_dump(nombresRandom());

// code de départ, mise en place des nombres
$nombres = [];
for ($i = 0; $i < 6; $i++) {

// ajouter un nombre au tableau array_push ($nombres, mt_rand(1,49))
    $valeur = mt_rand(1, 49);
// var_dump($nombres);

//tant que la valeur est déjà présente dans le tableau
    while (in_array($valeur, $nombres)) {
    //je la recalcule
        $valeur = mt_rand(1, 49);
    }
    $nombres[] = $valeur;
}
sort($nombres);
//ajouter un nombre au tableau
require("index.phtml");
?>
