<?php
namespace Cuisine\Models;

use Cuisine\Models\OriginManager;
use Cuisine\Models\DietManager;
use Cuisine\Models\CategoryManager;
use Cuisine\Models\IngredientManager;

class Meal
{
    private string $id_meal;
    private string $title_meal;
    private float $weight_meal;
    private float $price_meal;
    private string $id_origin;
    private string $label_origin;
    private string $id_diet;
    private string $label_diet;
    private string $id_category;
    private string $label_category;
    private array $ingredients = [];
    private float $amount_meal;

    public function setId_meal($id_meal): void
    {
        $this->id_meal = $id_meal;
    }
    public function getId_meal(): string
    {
        return $this->id_meal;
    }
    public function setId_origin($id_origin): void
    {
        $this->id_origin = $id_origin;
    }

    public function getId_origin(): string
    {
        return $this->id_origin;
    }
    public function setLabel_origin($label_origin): void
    {
        $this->label_origin = $label_origin;
    }

    public function getLabel_origin(): string
    {
        $OriginManager = new OriginManager();
        //get label and set it
        $this->setLabel_origin($OriginManager->get_one($this->id_origin)["label_origin"]);
        return $this->label_origin;
    }
    public function setId_diet($id_diet): void
    {
        $this->id_diet = $id_diet;
    }

    public function getId_diet(): string
    {
        return $this->id_diet;
    }
    public function setLabel_diet($label_diet): void
    {
        $this->label_diet = $label_diet;
    }

    public function getLabel_diet(): string
    {
        $DietManager = new DietManager();
        //get label and set it
        $this->setLabel_diet($DietManager->get_one($this->id_diet)["label_diet"]);
        return $this->label_diet;
    }
    public function setId_category($id_category): void
    {
        $this->id_category = $id_category;
    }
    public function getId_category(): string
    {
        return $this->id_category;
    }
    public function setLabel_category($label_category): void
    {
        $this->label_category = $label_category;
    }
    public function getLabel_category(): string
    {
        $CategoryManager = new CategoryManager();
        //get label and set it
        $this->setLabel_category($CategoryManager->get_one($this->id_category)["label_category"]);
        return $this->label_category;
    }

    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    public function getIngredients(): array
    {
        $IngredientManager = new IngredientManager();
        //get label and set it
        $this->setIngredients($IngredientManager->get_all_meal($this->id_meal));
        return $this->ingredients;
    }
    public function setTitle_meal($title_meal): void
    {
        $this->title_meal = $title_meal;
    }

    public function getTitle_meal(): string
    {
        return $this->title_meal;
    }
    public function setWeight_meal($weight_meal): void
    {
        $this->weight_meal = $weight_meal;
    }

    public function getWeight_meal(): float
    {
        return $this->weight_meal;
    }
    public function setPrice_meal($price_meal): void
    {
        $this->price_meal = $price_meal;
    }

    public function getPrice_meal(): float
    {
        return $this->price_meal;
    }
    public function setAmount_meal($amount_meal): void
    {
        $this->amount_meal = $amount_meal;
    }

    public function getAmount_meal(): float
    {
        return $this->amount_meal;
    }
}
