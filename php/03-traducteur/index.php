
<?php

// // //Fonctions que vous voulez utiliser

// // // Code principal (extraction de données de Post et appel à la fonction translate())
// // var_dump($_POST);
// $mot = $_POST["word"];//l'information vient des noms données en html 
// $sens = $_POST["direction"];

// // function wordTranslate($mot)
// // {
// //     $dictionnaire = ["chaise" => "chair", "telephone" => "phone", "chien" => "dog", "chat" => "cat"];
// //     if ($sens == "toEnglish") {
// //         array_search($mot, $dictionnaire);
// //         return $dictionnaire[$mot];
// //     }
// // }
// // $resultat = wordTranslate($mot);

// // require("index.phtml");
// < ? php

// Fonctions que vous voulez utiliser
function translate($mot, $sens)
{
    $mot = strtolower($mot);

    $dictionnaire = [
        'chaise' => 'chair',
        'maison' => 'house',
        'chien' => 'dog'
    ];

    if ($sens === "toEnglish") {
        if (array_key_exists($mot, $dictionnaire)) {
            $resultat = $dictionnaire[$mot];
        } else {
            $resultat = "Le mot que vous recherchez ($mot) n'existe pas dans notre dictionnaire";
        }
    } else {
        if (in_array($mot, $dictionnaire)) {
            $resultat = array_search($mot, $dictionnaire);
        } else {
            $resultat = "Le mot que vous recherchez ($mot) n'existe pas dans notre dictionnaire";
        }
    }

    return $resultat;
}

// Code principal (extraction des données du POST et appel à la fonction translate())
if (empty($_POST) === false) {
    $word = $_POST["word"];
    $direction = $_POST["direction"];

    $traduction = translate($word, $direction);
}

// Appel au template HTML
require("index.phtml");
?>