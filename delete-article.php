<?php

require_once("libraries/database.php");
require_once("libraries/utilities.php");
//1. Extraire l'identifiant à partir du get
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
//2. si il n'y a pas d'identifiant redirection vers l'index
if (!$id) {
    redirect("index.php");
}
var_dump($id);

deleteComment($id);
//3connexion à la base
// $pdo = getPDO();
// //4Préparation et exécution de la requête DELETE des commentaires liés à l'article
// $query = $pdo->prepare('DELETE FROM comments WHERE article_id=:id');
// $query->execute([
//     ':id' => $id
// ]);

//5. Préparation et exécution d'une requête delete de l'article en questionR
// $query = $pdo->prepare('DELETE FROM articles WHERE id=:id');
// $query->execute([
//     ':id' => $id
// ]);
deleteArticle($id);
redirect("index.php");
?>