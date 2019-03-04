<?php
require_once("libraries/database.php");
require_once("libraries/utilities.php");

//1)verifier que l'on est bien arrivé par le formulaire
redirectionIfNotSubmitted('index.php');
// $isSubmitted = !empty($_POST);
// if (!$isSubmitted) {
//     redirect('index . php');

// }

//2)récuperer les informations par le post en les validant nettoyant
// $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_SPECIAL_CHARS);
$nickname = $_SESSION['pseudo'];
$comment = extractSafeFromPost('comment');
// $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
$articleid = extractIntFromPost('articleid');
// $articleid = filter_input(INPUT_POST, 'articleid', FILTER_VALIDATE_INT);

//3)verifier les éventuelles erreurs et rediriger s'il y a une erreur
if (!$nickname || !$comment || !$articleid) {
    redirectBack();
}
//4) enregistrement du commentaire dans la base de données;


//on redirige vers la page de l'article en question

// var_dump($_POST);

insertComment($nickname, $comment, $articleid);
redirectBack();

// $errors = [];
// if (!$nickname) {
//     $errors[] = " votre nom est obligatoire";
// }
// if (!$comment) {
//     $errors[] = " votre commentaire est obligatoire";
// }
// if (!$articleid) {
//     $errors[] = "le numéro de l'article est obligatoire";
// }
// if (!empty($errors)) {
//     $phrases = implode(',', $errors);
//     require("Location : article.php?errors=$phrases");
// }

?>