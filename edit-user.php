<?php
require_once("libraries/database.php");
require_once("libraries/utilities.php");
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    redirect("index.php");
}



$bdd = getPDO();
$sql = "SELECT * FROM `users` WHERE id = :id";
$query = $bdd->prepare($sql);
$query->execute([":id" => $id]);
$user = $query->fetch(PDO::FETCH_ASSOC);


require('templates/partials/header.phtml');
require('templates/edit-user.phtml');
require('templates/partials/footer.phtml');
?>