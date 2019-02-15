<?php

/**
 * TRAITEMENT DU FORMULAIRE
 */
//1. savoir si le formulaire a été soumis?
//la fonction empty repond TRUEe si la varaible contient rien
//$post repésente les infos du formulaire donc si elle est vide c'est que le formulaire n'a aps été soumis
$isSubmitted = !empty($_POST); //$issuBmitted contiendra TRUE or FALSE

//2. si c'est soumis alors extraction des données
//on va créer des variables dans lesquelles on va palcer les informations du formulaire.
// le but  est de pouvoir les manipuler facilement, sans a voir à taper $_POST['....'] à chaque fois (c'est très chiant)
//c'est aussi ici que l'on pourra faire de la gestion des erruers (cahmp obligatoire non rempli, email mal  formé etc).
if ($isSubmitted === true) {
//si le formulaire a été soumis, on extrait
    $firstName = $_POST['firstName'];
    $lastName = strtoupper($_POST['lastName']);
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
}
/**
 * INCLUSION DU TEMPLATE HTML (partie affichage)
 */
require('01-corrections.phtml');
?>