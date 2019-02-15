<?php
$isSubmitted = empty($_POST) === false;
if ($isSubmitted) {

    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

}


require('09-confirmation.phtml')

?>