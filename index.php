<?php 

require_once("libraries/utilities.php");
require_once("libraries/database.php");
//1CONNEXION A la base de données
//recuperation de mes articles
$articles = getArticles();


require("templates/partials/header.phtml");
require("templates/index.phtml");
require("templates/partials/footer.phtml");
?>
