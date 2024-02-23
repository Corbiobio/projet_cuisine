<?php
ob_start();

?>

<article class="meal_list">

    <h2>Meals :</h2>

    <!-- create submit -->
    <form action="#" method="post">
        <div>
            <p>Create a new meal :</p>
        </div>
        <div>
            <label for="title">Title :</label>
            <input required type="text" name="title" id="title">
        </div>
        <div>
            <label for="price">Price :</label>
            <input min="1" value="1" type="number" name="price" id="price">
        </div>
        <div>
            <label for="weight">Weight in gramme:</label>
            <input type="number" min="1" value="1" name="weight" id="weight">
        </div>
        <div>
            <label for="origins">Origin : </label>
            <select id="origins" name="origin">
                <?php
                foreach ($origins as $origin) {
                    echo ("
                        <option value=$origin[0]>$origin[1]</option>
                        ");
                }
                ?>
            </select>
        </div>
        <div>
            <label for="diets">Diet : </label>
            <select id="diets" name="diet">
                <?php
                foreach ($diets as $diet) {
                    echo ("
                        <option value=$diet[0]>$diet[1]</option>
                        ");
                }
                ?>
            </select>
        </div>
        <div>
            <label for="categorys">Category : </label>
            <select id="categorys" name="category">
                <?php
                foreach ($categorys as $category) {
                    echo ("
                        <option value=$category[0]>$category[1]</option>
                        ");
                }
                ?>
            </select>
        </div>
        <div>
            <label for="ingredients">Ingredient : </label>
            <select multiple id="ingredients" name="ingredients">
                <?php
                foreach ($ingredients as $ingredient) {
                    echo ("
                        <option value=$ingredient[0]>$ingredient[1]</option>
                        ");
                }
                ?>
            </select>
        </div>

        <input type="submit" name="create" value="Create">
    </form>

    <?php
    foreach ($meals as $meal) {
        ?>

        <form action="#" method="post">
            <div>
                <label for="title_<?= $meal->getId_meal() ?>">Title :</label>
                <input required type="text" name="title" value="<?= $meal->getTitle_meal() ?>"
                    id="title_<?= $meal->getId_meal() ?>">
            </div>
            <div>
                <label for="price_<?= $meal->getId_meal() ?>">Price :</label>
                <input min="1" value="<?= $meal->getPrice_meal() ?>" type="number" name="price"
                    id="price_<?= $meal->getId_meal() ?>">
            </div>
            <div>
                <label for="weight_<?= $meal->getId_meal() ?>">Weight in gramme:</label>
                <input type="number" min="1" value="<?= $meal->getWeight_meal() ?>" name="weight"
                    id="weight_<?= $meal->getId_meal() ?>">
            </div>
            <div>
                <label for="origins_<?= $meal->getId_meal() ?>">Origin : </label>
                <select id="origins_<?= $meal->getId_meal() ?>" name="origin">
                    <?php
                    foreach ($origins as $origin) {
                        $is_select = false;

                        //if same id 
                        if ($meal->getId_origin() == $origin[0]) {
                            $is_select = true;
                        }

                        //select the good option
                        if ($is_select) {
                            echo ("
                            <option selected value=$origin[0]>$origin[1]</option>
                            ");
                        } else {
                            echo ("
                            <option value=$origin[0]>$origin[1]</option>
                            ");
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="diets_<?= $meal->getId_meal() ?>">Diet : </label>
                <select id="diets_<?= $meal->getId_meal() ?>" name="diet">
                    <?php
                    foreach ($diets as $diet) {
                        $is_select = false;

                        //if same id 
                        if ($meal->getId_diet() == $diet[0]) {
                            $is_select = true;
                        }

                        //select the good option
                        if ($is_select) {
                            echo ("
                            <option selected value=$diet[0]>$diet[1]</option>
                            ");
                        } else {
                            echo ("
                            <option value=$diet[0]>$diet[1]</option>
                            ");
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="categorys_<?= $meal->getId_meal() ?>">Category : </label>
                <select id="categorys_<?= $meal->getId_meal() ?>" name="category">
                    <?php
                    foreach ($categorys as $category) {
                        $is_select = false;

                        //if same id 
                        if ($meal->getId_category() == $category[0]) {
                            $is_select = true;
                        }

                        //select the good option
                        if ($is_select) {
                            echo ("
                            <option selected value=$category[0]>$category[1]</option>
                            ");
                        } else {
                            echo ("
                            <option value=$category[0]>$category[1]</option>
                            ");
                        }
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="ingredients">Ingredient : </label>
                <select multiple id="ingredients" name="ingredients[]">
                    <?php
                    foreach ($ingredients as $ingredient) {
                        //if ingredient is in meal
                        $is_in = false;
                        foreach ($meal->getIngredients() as $ingr) {
                            if ($ingr["id_ingredient"] == $ingredient[0]) {
                                $is_in = true;
                            }
                        }

                        if ($is_in) {
                            echo ("
                            <option selected value=$ingredient[0]>$ingredient[1]</option>
                            ");
                        } else {
                            echo ("
                            <option value=$ingredient[0]>$ingredient[1]</option>
                            ");
                        }
                    }
                    ?>
                </select>
            </div>

            <input type="hidden" name="id" value="<?= $meal->getId_meal() ?>">
            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">
        </form>

        <?php
    }
    ?>
</article>

<?php
$content_admin = ob_get_clean();
require VIEWS . './page/admin/admin_layout.php';