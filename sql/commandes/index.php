<?php
//Connexion à la base de données et récupération des données intéressantes dans une variable
$bdd = new PDO("mysql:host=localhost;dbname=classicmodels;charset=utf8", "root", "troiswa");
// on crée une requet qui ira cherhcher les infirmations de la commande( infos du client, infos de la commande, infos de l'office)
$sql = "SELECT o . orderNumber, o . status, o . orderDate, o . shippedDate, c . customerName, c . contactFirstName, c . contactLastName, e . firstName, e . lastName, of . city, ROUND(SUM((od . quantityOrdered * od . priceEach)), 2) as montant
    FROM orders as o
    JOIN orderdetails as od ON o . orderNumber = od . orderNumber
    JOIN customers as c ON o . customerNumber = c . customerNumber
    JOIN employees as e ON c . salesRepEmployeeNumber = e . employeeNumber
    JOIN offices as of ON e . officeCode = of . officeCode
    GROUP BY o . orderNumber
    ORDER BY o . orderDate DESC";
$requete = $bdd->prepare($sql);

$requete->execute();

$commandes = $requete->fetchall(PDO::FETCH_ASSOC);


require('templates/orders.phtml');
?>