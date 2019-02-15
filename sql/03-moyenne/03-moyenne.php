<?php

//1)crée une connection entre php et MySQL
$bdd = new PDO("mysql:host=localhost;dbname=classicmodels;charset=utf8", "root", "troiswa");

//2) écrire une requête :
$sql = "SELECT AVG(buyPrice) AS moyenne, MAX(buyPrice) AS maximum, MIN(buyPrice)AS minimum, productVendor AS fournisseur FROM products GROUP BY productVendor ORDER BY moyenne DESC";


//3) préparer le requête (créeer une requête):
$requete = $bdd->prepare($sql);

// 4) j'exécute la reqête pour de bon
$requete->execute();

// 5) je récupère les données que MySQL a renvoyé
$vendors = $requete->fetchAll(PDO::FETCH_ASSOC);
< ? php endforeach ?>

require('03-moyenne.phtml')



?>