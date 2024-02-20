<?php
ob_start();
?>

<section>
    <h1>Home</h1>

    <div class="form_container">
        <form action="meals/sort_ingredient" method="post">
            <div>
                <label for="ingredients">Liste des plats via un ingredient : </label>
                <input required list="ingredients_list" name="ingredients" id="ingredients">
                <datalist id="ingredients_list">
                    <?php
                    foreach ($ingredients as $ingredient) {
                        echo ("
                    <option value=$ingredient[1]>$ingredient[1]</option>
                    ");
                    }
                    ?>
                </datalist>
            </div>

            <input type="submit">
        </form>

        <form action="meals/sort_title" method="post">
            <div>
                <label for="word">Liste des plats via leurs titre : </label>
                <input required type="text" name="word" id="word">
            </div>

            <input type="submit">
        </form>

        <form action="meals/sort_origin" method="post">
            <div>
                <label for="min_price">Prix minimum : </label>
                <input required type="number" min="0" value=0 name="min_price" id="min_price">
            </div>
            <div>
                <label for="max_price">Prix maximum : </label>
                <input required type="number" min="0" value=100 name="max_price" id="max_price">
            </div>
            <div>
                <label for="origins">Origine des plats : </label>
                <input required list="origins_list" name="origin" id="origins">
                <datalist id="origins_list">
                    <?php
                    foreach ($origins as $origin) {
                        echo ("
                        <option value=$origin[1]>$origin[1]</option>
                        ");
                    }
                    ?>
                </datalist>
            </div>
            <input type="submit">
        </form>
    </div>

</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
