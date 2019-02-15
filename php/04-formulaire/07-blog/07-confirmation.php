<?php
$isSubmitted = empty($_POST) === false;
if ($isSubmitted) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $img = $_POST['img'];
    $contain = $_POST['contain'];
}
$types = [
    "politique" => "Politique",
    "cuisine" => "Cuisine",
    "actualité" => "Actualité"
];
var_dump($_POST);
require("07-confirmation.phtml")

?>