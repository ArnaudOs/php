<?php

require_once("libraries/database.php");
require_once("libraries/utilities.php");

$email = extractSafeFromPost('pseudo');
$password = extractSafeFromPost('password');

//verification dans la base de données si le mot correspond

$pdo = getPDO();
$query = $pdo->prepare('SELECT* FROM users WHERE email=:email');
$query->execute([':email' => $email]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    redirectBack();
}


$validation = password_verify($password, $user['password']);

// var_dump($user);

if (!$validation) {
    redirectBack();
}
var_dump($validation);
var_dump($user);

$_SESSION['connected'] = true;
$_SESSION['prenom'] = $user['firstname'];
redirect("index.php");


?>