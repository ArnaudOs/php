<?php
$isSubmitted = empty($_POST) === false;
if ($isSubmitted) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];
}

$types = [
    "dog" => "chien",
    "cat" => "chat",
    "mouse" => "souris",
    "other" => "exotique (je ne connais pas cet animal)"
];

var_dump($_POST);
require("06-confirmation.phtml")
?>