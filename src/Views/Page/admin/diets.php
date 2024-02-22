<?php
ob_start();
?>

<h2>diets :</h2>

<!-- create submit -->
<form action="#" method="post">
    <p>Create a new diet :</p>
    <label for="label">Label :</label>
    <input type="text" name="label" id="label" required>
    <input type="submit" name="create" value="Create">
</form>

<?php

foreach ($diets as $diet) {

    ?>

    <form action="#" method="post">
        <div>
            <label for="label_<?= $diet["id_diet"] ?>">label :</label>
            <input type="text" name="label_diet" id="label_<?= $diet["id_diet"] ?>" value="<?= $diet["label_diet"] ?>">

            <input type="hidden" name="id_diet" value="<?= $diet["id_diet"] ?>">

            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">
        </div>
    </form>



    <?php
}

$content_admin = ob_get_clean();
require VIEWS . './page/admin/admin_layout.php';