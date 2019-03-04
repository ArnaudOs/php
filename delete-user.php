<?php
require_once("libraries/database.php");
require_once("libraries/utilities.php");
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    redirect("users.php");
}
var_dump($id);
$pdo = getPDO();
$query = $pdo->prepare('DELETE FROM users WHERE id=:id');
$query->execute([':id' => $id]);
redirect("users.php");
?>