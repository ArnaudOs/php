<?php
var_dump($_GET);
// var_dump($_GET['prenom']);
// on extrait les informations du GET/POST
if (array_key_exists("prenom", $_GET)) {
    $prenom = $_GET['prenom'];
} else {
    $prenom = " Anonyme";
}
if (array_key_exists("age", $_GET)) {
    $age = $_GET['age'];
} else {
    $age = 0;
}
//include require
require("get.phtml");
?>