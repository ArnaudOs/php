<?php
$isSubmitted = !empty($_POST);
if (!$isSubmitted) {
    header('Location 05-customer-form.php');
    exit();
}

$customerName = filter_input(INPUT_POST, 'customerName');
$contactFirstName = filter_input(INPUT_POST, 'contactFirstName');
$contactLastName = filter_input(INPUT_POST, 'contactLastName');
$phone = filter_input(INPUT_POST, 'phone');
$adress = filter_input(INPUT_POST, 'adress');
$city = filter_input(INPUT_POST, 'city');
$country = filter_input(INPUT_POST, 'country');

$errors = [];
if (!$customerName) {
    $errors[] = "le nom du client est obligatoire";
}
if (!$contactFirstName) {
    $errors[] = "le prenom du contact est obligatoire";
}
if (!$contactFirstName) {
    $errors[] = "le nom du contact est obligatoire";
}
if (!$phone) {
    $errors[] = "le téléphone est obligatoire";
}
if (!$adress) {
    $errors[] = "l'adresse est obligatoire";
}
if (!$city) {
    $errors[] = "la ville est obligatoire";
}
if (!$country) {
    $errors[] = "le pays est obligatoire";
}

if (!empty($errors)) {
    $phrases = implode(',', $errors);
    header("Location: 05-customer-form.php?errors=$phrases");
    exit();
}
?>