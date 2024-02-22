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
    <header>
        <!-- nav bar -->
        <nav>
            <?php
            if (is_login()) {
                echo ("
                <a href=/>Home</a>
                <a href=cart>Panier</a>
                <a href=meals>Tout les plats</a>
                <a href=logout>Logout</a>
                ");
            } else {
                echo ("<a href=login>Login</a>");
            }
            ?>
        </nav>
    </header>
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
