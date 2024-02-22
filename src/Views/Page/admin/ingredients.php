<?php
ob_start();
?>

<h2>Ingredients :</h2>

<!-- create submit -->
<form action="#" method="post">
    <p>Create a new ingredient :</p>
    <label for="label">Label :</label>
    <input type="text" name="label" id="label" required>
    <input type="submit" name="create" value="Create">
</form>

<?php

foreach ($ingredients as $ingredient) {

    ?>

    <form action="#" method="post">
        <div>
            <label for="label_<?= $ingredient["id_ingredient"] ?>">label :</label>
            <input type="text" name="label_ingredient" id="label_<?= $ingredient["id_ingredient"] ?>"
                value="<?= $ingredient["label_ingredient"] ?>">

            <input type="hidden" name="id_ingredient" value="<?= $ingredient["id_ingredient"] ?>">

            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">
        </div>
    </form>



    <?php
}

$content_admin = ob_get_clean();
require VIEWS . './page/admin/admin_layout.php';