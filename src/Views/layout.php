<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuisine">
    <meta name="author" content="Corbio">
    <title>— Cuisine —</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <main>
        <!-- content from view -->
        <?= $content; ?>
    </main>
</body>

</html>
<?php

//remove error and old
unset($_SESSION['error']);
unset($_SESSION['old']);
