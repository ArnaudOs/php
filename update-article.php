<?php
require_once("libraries/database.php");
require_once("libraries/utilities.php");
//1) verifier que le formulaire a été soumis sinon redirection vers l'index
require_once("libraries/database.php");
require_once("libraries/utilities.php");
redirectionIfNotSubmitted("index.php");
//2) extraction des données du post avec des filtres
$title = extractSafeFromPost('title');
$categories = extractIntFromPost('categories');
$authors = extractIntFromPost('authors');
$id = extractIntFromPost('id');
$content = filter_input(INPUT_POST, 'content');
//3) s'il ya une erreur sur un des champs rediriger sur la page précédente
if (!$title || !$categories || !$authors || !$content || !$id) {
    redirectBack();
}
//4) preparation et execution d'une requête UPDATE
// $pdo = getPDO();
// $query = $pdo->prepare('UPDATE articles SET 
// title= :title, 
// category_id= :category_id,
// author_id=:author_id,
// content=:content WHERE articles.id=:id');
// $query->execute([
//     ':title' => $title,
//     ':category_id' => $categories,
//     ':author_id' => $authors,
//     ':content' => $content,
//     ':id' => $id
// ]);
updateArticle($title, $categories, $authors, $content, $id);
//5) redirection vers la page qui montre l'article
redirect("article.php?id=$id");

?>