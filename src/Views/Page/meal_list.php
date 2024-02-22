<?php
ob_start();
?>

<section class="meal_list">
    <h1>Plats</h1>
    <?php
    foreach ($meals as $meal) {
        ?>

        <form action="/cart" method="post">
            <div>
                <h2>
                    <?= $meal->getTitle_meal() ?>
                    <span>
                        <?= $meal->getLabel_diet() ?> &
                        <?= $meal->getLabel_category() ?>
                    </span>
                </h2>
            </div>
            <div>
                <p>
                    Origine :
                    <?= $meal->getLabel_origin() ?>
                </p>
            </div>
            <div>
                <p>Ingredient :</p>
                <ul>
                    <?php
                    $ingredients = $meal->getIngredients();
                    foreach ($ingredients as $ingredient) {
                        $ingredient = $ingredient["label_ingredient"];
                        echo ("<li>$ingredient</li>");
                    }
                    ?>
                </ul>
            </div>
            <div>
                <p>
                    Poids :
                    <?= $meal->getWeight_meal() ?>
                    grammes
                </p>
            </div>
            <div>
                <p>
                    Prix :
                    <?= $meal->getPrice_meal() ?>
                    €
                </p>
            </div>
            <div>
                <label for="amount">Quantité : </label>
                <input type="number" value=1 min=1 id="amount" name="amount">
            </div>

            <input type="hidden" name="id_meal" value="<?= $meal->getId_meal() ?>">
            <input type="submit">
        </form>
        <?php
    }
    ?>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';