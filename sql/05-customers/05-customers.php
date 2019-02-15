<?php
//1 connexion a la abse de données avec PDO
$bdd = new PDO(
    "mysql:host=localhost;dbname=classicmodels;charset=utf8",
    "root",
    "troiswa"
);
// 2ON PRÉPARE UEN requete
$sql = "SELECT c.customerNumber, c.customerName, c.contactFirstName, c.contactLastName, c.phone, c.city, c.country, e.firstName, e.lastName FROM customers AS c JOIN employees as e ON e.employeeNumber = c.salesRepEmployeeNumber";
// 3on exécute la requête
$query = $bdd->prepare($sql);
$query->execute();
// 4
$customers = $query->fetchAll(PDO::FETCH_ASSOC);
require('05-customers.phtml');

?>