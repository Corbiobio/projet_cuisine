<?php
ob_start();
?>

<section class="meal_list">
    <h1>Plats</h1>
    <?php
    foreach ($meals as $meal) {
        ?>

        <article>
            <h2>
                <?= $meal->getTitle_meal() ?>
            </h2>
            <p>
                <?= $meal->getLabel_origin() ?>
            </p>
            <p>
                <?= $meal->getLabel_diet() ?>
            </p>
            <p>
                <?= $meal->getPrice_meal() ?>
            </p>
            <p>
                <?= $meal->getWeight_meal() ?>
            </p>
            <p>
                <?= $meal->getLabel_category() ?>
            </p>
            <div>
                <?php
                $ingredients = $meal->getIngredients();
                foreach ($ingredients as $ingredient) {
                    $ingredient = $ingredient["label_ingredient"];
                    echo ("<p>$ingredient</p>");
                }
                ?>
            </div>
        </article>
        <?php
    }
    ?>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';