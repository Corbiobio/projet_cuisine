<?php
ob_start();
?>

<section>

    <!-- nav bar -->
    <?php
    if (is_login()) {

    } else {

    }
    ?>
    <h1>homepage</h1>


</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
