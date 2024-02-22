<?php
ob_start();

?>

<section>
    <h1>Erreur 404</h1>
    <?php if (is_login()) {
        echo ("<a href=/>go to home</a>");
    } else {
        echo ("<a href=/login>go to login</a>");
    }
    ?>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
