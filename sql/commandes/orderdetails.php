<?php
//fonction qui permet de  vérifier dans ce cas si le numéro existe ou la donnée en générale
$orderNumber = filter_input(INPUT_GET, 'numero', FILTER_VALIDATE_INT);
if (!$orderNumber) {

    header("Location: index.php");
    exit();
}

//ci dessous le mme code mais en plus compliqué
// if (!array_key_exists('numero', $_GET) || !ctype_digit($_GET['numero'])) {//on utilise ctype digit pour verifier que la chaine de caractere ne renvoit que des entiers
// //Pour le numéro de la commande qui nous intéresse on crée une variable
//     //je veux le rediriger vers le navigateur vers le fichier index.php
//     header("Location: index.php");
//     exit();
// }

// $orderNumber = $_GET['numero'];
// if (array_key_exists('numero', $_GET) && ctype_digit($_GET['numero'])) {//on utilise ctype digit pour verifier que la chaine de caractere ne renvoit que des entiers
// //Pour le numéro de la commande qui nous intéresse on crée une variable
//     $orderNumber = $_GET['numero'];
// } else {
//     //je veux le rediriger vers le naviateur vers le fichier index.php
//     header("Location: index.php");
//     exit();
// }
//on se connecte a la base de données
$bdd = new PDO("mysql:host=localhost;dbname=classicmodels;charset=utf8", "root", "troiswa");

//verifier si la commande spécifiée existe
$requete = $bdd->prepare('SELECT * FROM orders where orderNumber = :numero');//on fait la requête simplifiée en une ligne
$requete->execute([':numero' => $orderNumber]);
if ($requete->rowCount() == 0) {//si le nombre de lignes est a 0 alors on redirige l'utilisateur vers la page
    header("Location: index.php");
    exit();
}

// on crée une requete qui ira cherhcher les informations de la commande( infos du client, infos de la commande, infos de l'office)
$sql = "SELECT o . orderNumber, o . status, o . orderDate, o . shippedDate, c . customerName, c . contactFirstName, c . contactLastName, e . firstName, e . lastName, of . city, od . productCode, od . quantityOrdered, p . productName, od . priceEach, round((od . quantityOrdered * od . priceEach),2) as montant
    FROM orders as o
    JOIN orderdetails as od ON o . orderNumber = od . orderNumber
    JOIN customers as c ON o . customerNumber = c . customerNumber
    JOIN employees as e ON c . salesRepEmployeeNumber = e . employeeNumber
    JOIN offices as of ON e . officeCode = of . officeCode
    JOIN products as p ON od . productCode = p . productCode
    WHERE o . orderNumber = :numeroCommande ORDER BY o . orderDate DESC"; //le : rienAfaire sert a sécuriser pour qu'on ne puiisse pas utiliser la variable à notre insu on ajoute un marqueur
//pour arrondir dans la abse on met round et après la parenthèse le nombre de 0 qu'on retient ici 2)
//on stocke ces informations dans une variable de la fonction fetch() et non pas fetchAll()
//
$requete = $bdd->prepare($sql);
//on crée une requet qui ira chercher les produits de la commande
$requete->execute([':numeroCommande' => $orderNumber]);//
// on stocke ces infos dans une variable avec la fonction fetchAll
$details = $requete->fetchAll(PDO::FETCH_ASSOC);//c'est pour exploiter les données de manière associative (non indexée)


$Totals = 0;
foreach ($details as $detail) {
    $Totals += $detail['montant'];
}
//on fait appel au template HTML
require('templates/order-details.phtml');

?>