<?php
ob_start();
?>

<h2>Origins :</h2>

<!-- create submit -->
<form action="#" method="post">
    <p>Create a new origin :</p>
    <label for="label">Label :</label>
    <input type="text" name="label" id="label" required>
    <input type="submit" name="create" value="Create">
</form>

<?php

foreach ($origins as $origin) {

    ?>

    <form action="#" method="post">
        <div>
            <label for="label_<?= $origin["id_origin"] ?>">label :</label>
            <input type="text" name="label_origin" id="label_<?= $origin["id_origin"] ?>"
                value="<?= $origin["label_origin"] ?>">

            <input type="hidden" name="id_origin" value="<?= $origin["id_origin"] ?>">

            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">
        </div>
    </form>



    <?php
}

$content_admin = ob_get_clean();
require VIEWS . './page/admin/admin_layout.php';