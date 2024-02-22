<?php
ob_start();
?>

<section class="cart">
    <h1>Panier</h1>

    <form action="cart/update" method="post">
        <?php
        foreach ($meals as $meal) {
            ?>

            <div class="cart_item">
                <div>
                    <h2>
                        <?= $meal->getTitle_meal() ?>

                    </h2>
                </div>
                <div>
                    <label for="amount_<?= $meal->getId_meal() ?>">Quantité : </label>
                    <!-- put id meal in key in amount  -->
                    <input min="0" type="number" id="amount_<?= $meal->getId_meal() ?>"
                        name="amount[<?= $meal->getId_meal() ?>]" value="<?= $meal->getAmount_meal() ?>">
                </div>
                <div>
                    <p>Prix unité :
                        <?= $meal->getPrice_meal() ?>
                        €
                    </p>
                </div>
                <div>
                    <p>Prix total :
                        <?= $meal->getAmount_meal() * $meal->getPrice_meal() ?>
                        €
                    </p>
                </div>
            </div>

            <?php
        }
        ?>
        <input type="submit" value="Actualiser">
    </form>

    <button><a href="/cart/valid_cart">Valider le panier</a></button>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';