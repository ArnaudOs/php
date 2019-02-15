<?php
function translate($mot, $sens)
{
    $dictionnaire = ["chaise" => "chair", "maison" => "house", "chien" => "dog", "chat" => "cat"];// on cherche la valeur dot la clé est la définition
    if ($sens === "toenglish") {
        $resultat = $dictionnaire[$mot];
    } else {
        $resultat = array_search($mot, $dictionnaire);
    }
    return $resultat;
}
$word = $_POST["word"];
$direction = $_POST["direction"];


require("index.phtml");
?>