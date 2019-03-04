<?php

require_once("libraries/database.php");
require_once("libraries/utilities.php");


redirectionIfNotSubmitted('add-user.php');

$email = extractSafeFromPost('email');
$firstname = extractSafeFromPost('firstname');
$lastname = extractSafeFromPost('lastname');
$password = extractSafeFromPost('password');
$hash = password_hash($password, PASSWORD_DEFAULT);


if (!$email || !$firstname || !$lastname || !$password) {
    header('Location: add-user.php');
    exit();
}
$pdo = getPDO();
$query = $pdo->prepare('INSERT INTO users SET 
email = :email,
firstname= :firstname,
lastname= :lastname,
password= :password');
$query->execute([
    ':email' => $email,
    ':firstname' => $firstname,
    ':lastname' => $lastname,
    ':password' => $hash,
]);
redirect('users.php');

?>