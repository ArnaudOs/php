<?php
require_once("libraries/utilities.php");
require_once("libraries/database.php");
$bdd = getPDO();
$sql = "SELECT * FROM `users`";
$query = $bdd->prepare($sql);
$query->execute();
$users = $query->fetchALL(PDO::FETCH_ASSOC);
// var_dump($users);
require('templates/partials/header.phtml');
require('templates/users.phtml');
require('templates/partials/footer.phtml');

?>