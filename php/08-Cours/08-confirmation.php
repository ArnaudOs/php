<?php 
$isSubmitted = empty($_POST) === false;
if ($isSubmitted) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $teacher = $_POST['teacher'];
    $duration = $_POST['duration'];
}



require("08-confirmation.phtml")
?>