<?php
require_once("libraries/database.php");
require_once("libraries/utilities.php");
$categories = getCategorie();


$authors = getAuthors();


require("templates/partials/header.phtml");
require("templates/add-article.phtml");
require("templates/partials/footer.phtml");
?>