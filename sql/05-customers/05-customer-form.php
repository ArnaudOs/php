<?php
$hasErrors = false;
if (array_key_exists('errors', $_GET)) {
    $hasErrors = true;
    $errors = explode(",", $_GET['errors']);
}


require("05-customer-form.phtml")
?>