<?php
ob_start();
?>

<section>
    <h1>homepage</h1>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
