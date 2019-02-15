<?php
$hasErrors = false;//si il y a des erruers on affiche la div rouge d'erreur sinon elle disparaît
if (array_key_exists('errors', $_GET)) {
    $hasErrors = true;
    $errors = explode(",", $_GET['errors']);
}
    
// les origines du visiteur
require('10-origins.php');


require('10-instruction.phtml');
?>