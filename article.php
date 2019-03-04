<?php
require_once("libraries/utilities.php");
require_once("libraries/database.php");
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    redirect("index.php");

}
$article = getArticle($id);
if (!$article) {
    redirect("index.php");
}
//recuperation des commentaires de l'article
$commentaires = getComments($id);

require("templates/partials/header.phtml");
require("templates/article.phtml");
require("templates/partials/footer.phtml");

?>
