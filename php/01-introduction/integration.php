<?php
$prenom = "arnaud";
$nom = "Osenda";

$eleves = ["Mika", "Camille", "Nico", "Camille"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <header>
        <h1> PHP et HTML</h1>
    </header>
    <main>
        <p>Bonjour<?= $prenom ?> <strong><?php echo $nom ?> </strong>
        <h2>Les élèves :</h2>
        <ul>
            <?php foreach ($eleves as $prenom) : ?>
            <li><?php echo $prenom ?></li>
            <?php endforeach ?>
        </ul>
    </main>
    
</body>
</html>
