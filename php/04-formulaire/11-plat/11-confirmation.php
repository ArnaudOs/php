<?php
$isSubmitted = !empty($_POST);
if (!$isSubmitted) {
    header('Location: 11-plat.php');
    exit();
}


$title = filter_input(INPUT_POST, 'title');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$description = filter_input(INPUT_POST, 'description');
$vegetarian = filter_input(INPUT_POST, 'vegetarian');

$errors = [];
if (!$title) {
    $errors[] = "le titre est obligatoire";
}
if (!$price) {
    $errors[] = "le prix est obligatoire";
}
if (!$description) {
    $errors[] = "la description est obligatoire";
}
if (!$vegetarian) {
    $errors[] = "le champ vegetarien doit être renseigné";
}

if (!empty($errors)) {
    $phrases = implode(',', $errors);
    header("Location: 11-plat.php?errors=$phrases");
    exit();
}
require('11-confirmation.phtml')

?>
