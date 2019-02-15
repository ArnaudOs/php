<?php
//detection du submit
$isSubmitted = !empty($_POST);
if (!$isSubmitted) {
    header('Location: 10-instruction.php');
    exit();
}
//si ca été soumis alors extraction des informations
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$origin = filter_input(INPUT_POST, 'origin');

//un tableau qui va contenir les erreur détéctées
$errors = [];

if (!$firstName) {
    // array_push($errors, "le prenom est obligatoire");
    $errors[] = " le prénom est obligatoire";
}

if (!$lastName) {
    $errors[] = " le nom est obligatoire";
}

if (!$email) {
    $errors[] = " le mail doit avoir un format valide";
}
if (!$origin) {
    $errors[] = " l'origine doit être selectionnée";
}
//si le tableau des erruers n'est pas vide
//ca veut dire qu'on a detecté des erreurs
if (!empty($errors)) {
//je veux redirigier vers le formulaire en précisant les erreurs
    $phrases = implode(',', $errors);
    header("Location: 10-instruction.php?errors=$phrases");
    exit();
};
//les origines du visteur
require('10-origins.php');

require('10-confirmation.phtml');
?>