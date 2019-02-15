<?php
$isSubmit = !empty($_POST);
if ($isSubmit === true) {
    $title = $_POST['title'];
    $director = $_POST['director'];
    $year = $_POST['year'];
    $resume = $_POST['resume'];
    $rating = $_POST['rating'];
}





require("05-films.phtml")
?>