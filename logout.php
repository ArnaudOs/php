<?php
session_start();
$_SESSION['connected'] = false;
$_SESSION['prenom'] = "";

header('Location: index.php');
exit();

?>