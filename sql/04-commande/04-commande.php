<?php
//1) crée une connection entre php et Mysql
$bdd = new PDO("mysql:host=localhost;dbname=classicmodels;charset=utf8", "root", "troiswa");

// 2) écrire une requête : on récupère le code de la requête à aller chercher
$sql = "SELECT productCode, quantityOrdered, priceEach, (quantityOrdered*priceEach) AS TOTAL FROM `orderdetails`  WHERE`orderNumber`=10107";

// 3 prépare la requête (créer une requête):
$requete = $bdd->prepare($sql);

// 4) j'exécute la requête pour de bon
$requete->execute();

// 5)je récupère les données que MySql a renvoyé
$products = $requete->fetchAll(PDO::FETCH_ASSOC);

require('04-commande.phtml');

?>