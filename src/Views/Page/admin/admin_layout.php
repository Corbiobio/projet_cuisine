<?php
ob_start();
?>

<section>
    <h1>Admin</h1>

    <nav>
        <a href="/admin/ingredients">Ingredients</a>
        <a href="/admin/origins">Origins</a>
        <a href="/admin/diets">Diets</a>
    </nav>

    <div>
        <?= $content_admin ?>
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';