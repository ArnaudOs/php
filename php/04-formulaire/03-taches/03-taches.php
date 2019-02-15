<?php
$siEnvoi = !empty($_POST);
if ($siEnvoi === true) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priorite = $_POST['priorite'];
}



require('03-taches.phtml');
?>