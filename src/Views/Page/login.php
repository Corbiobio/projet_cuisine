<?php
ob_start();
?>

<section>


    <?php
    if (is_login()) {
        ?>
        <p>Your login !</p>
        <?php
    } else {
        ?>

        <h1>login</h1>

        <form action="#" method="post">
            <div>
                <label for="mail">mail : </label>
                <input required type="text" id="mail" name="mail">
            </div>

            <div>
                <label for="password">password : </label>
                <input required type="password" id="password" name="password">
            </div>

            <input type="submit">
        </form>
        <?php
    }
    ?>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';