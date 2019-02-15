<?php

//1)crée une connection entre php et MySQL
$bdd = new PDO("mysql:host=localhost;dbname=classicmodels;charset=utf8", "root", "troiswa");

//2) écrire une requête :
$sql = "SELECT * FROM products";


//3) préparer le requête (créeer une requête):
$requete = $bdd->prepare($sql);

// 4) j'exécute la reqête pour de bon
$requete->execute();

// 5) je récupère les données que MySQL a renvoyé
$products = $requete->fetchAll(PDO::FETCH_ASSOC);



require('02-products.phtml')


?>