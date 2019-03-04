<?php
require_once("libraries/database.php");
require_once("libraries/utilities.php");
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    redirect("index.php");
}
$article = getArticle($id);
// $bdd = getPDO();
// $sql = " SELECT * FROM `articles` WHERE id = :id ";
// $query = $bdd->prepare($sql);
// $query->execute([":id" => $id]);
// $article = $query->fetch(PDO::FETCH_ASSOC);


$categories = getCategorie();
// $sql = "SELECT * FROM `categories`";
// $query = $bdd->prepare($sql);
// $query->execute();
// $categories = $query->fetchALL(PDO::FETCH_ASSOC);

$authors = getAuthors();
// $sql = "SELECT* FROM authors";
// $query = $bdd->prepare($sql);
// $query->execute();
// $authors = $query->fetchAll(PDO::FETCH_ASSOC);

require("templates/partials/header.phtml");
require("templates/edit-article.phtml");
require("templates/partials/footer.phtml");
?>