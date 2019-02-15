<?php
//les différents types d'animaux possibles
$types = [
    "dog" => "chien",
    "cat" => "chat",
    "mouse" => "souris",
    "other" => "exotique (je ne connais aps cet animal)"
];

foreach ($types as $cle => $valeur) {

}
/** 
 *on appelle le ficheir html (template)
 */
require('06-veto.phtml');