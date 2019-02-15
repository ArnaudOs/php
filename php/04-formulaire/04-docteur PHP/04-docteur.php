<?php
$siEnvoi = !empty($_POST);
if ($siEnvoi === true) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $raison = $_POST['raison'];
    $value1 = $_POST['1'];
    $value2 = $_POST['2'];
    $value3 = $_POST['3'];
}





require('04-docteur.phtml')
?>