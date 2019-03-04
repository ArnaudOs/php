<?php

require_once("libraries/database.php");
require_once("libraries/utilities.php");
redirectionIfNotSubmitted("edit-user.php");
$id = extractIntFromPost('id');
$email = extractSafeFromPost('email');
$firstname = extractSafeFromPost('firstname');
$lastname = extractSafeFromPost('lastname');
$password = extractSafeFromPost('password');
if (!$email || !$firstname || !$lastname || !$password || !$id) {
    redirectBack();
}
$pdo = getPDO();
$query = $pdo->prepare('UPDATE users SET
email= :email,
firstname= :firstname,
lastname= :lastname,
password= :password
WHERE id=:id');
$query->execute([
    ':email' => $email,
    ':firstname' => $firstname,
    ':lastname' => $lastname,
    ':password' => $password,
    ':id' => $id
]);
redirect('users.php');

?>