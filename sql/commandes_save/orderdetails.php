<?php
//on se connecte a la base de données

// on crée une requet qui ira cherhcher les infirmations de la commande( infos du client, infos de la commande, infos de l'office)


//on stocke ces informations dans une variable de la fonction fetch() et non pas fetchAll()

//on crée une requet qui ira chercher les produits de la commande

// on stocke ces infos dans une variable avec la fonction fetchAll

//on fait appel au template HTML
require('templates/order-details.phtml');

?>