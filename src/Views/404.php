<?php
ob_start();

?>

<section>
    <h1>Erreur 404</h1>
    <a href="/">go to home</a>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
