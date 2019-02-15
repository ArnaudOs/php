<?php
$siEnvoi = !empty($_POST);
if ($siEnvoi === true) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['img'];
}



require("02-annonce.phtml");
?>