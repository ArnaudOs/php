<?php
require_once("libraries/utilities.php");
require_once("libraries/database.php");
redirectionIfNotSubmitted('add-article.php');
// $isSubmitted = !empty($_POST);
// if (!$isSubmitted) {
//     header('Location: add-article.php');
//     exit();
// }
// $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$title = extractSafeFromPost('title');
// $categories = filter_input(INPUT_POST, 'categories', FILTER_VALIDATE_INT);
$categories = extractIntFromPost('categories');
// $authors = filter_input(INPUT_POST, 'authors', FILTER_VALIDATE_INT);
$authors = extractIntFromPost('authors');
$content = filter_input(INPUT_POST, 'content');

if (!$title || !$categories || !$authors || !$content) {
    header('Location: add-article.php');
    exit();
}
// $pdo = getPDO();
// $query = $pdo->prepare('INSERT INTO articles SET
// title= :title,
// category_id= :category_id,
// author_id= :author_id,
// content= :content,
// creation_date= :creation_date');
// $query->execute([
//     ':title' => $title,
//     ':category_id' => $categories,
//     ':author_id' => $authors,
//     ':content' => $content,
//     ':creation_date' => date('Y-m-d H:i:s')
// ]);
insertArticle($title, $categories, $authors, $content);
header('Location: index.php');
exit();
// var_dump($_POST);
?>