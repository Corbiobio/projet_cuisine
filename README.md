# Cuisine
Projet d'entrainerment -> SASS, PHP, POO, MVC, MCD/MLD 
## Preview

![preview](https://github.com/Corbiobio/projet_cuisine/blob/main/public/img/preview.png )

## temps total : 13h30

- ### Readme : 30min

- ### Base de donnée : 1h
  - MCD : 45 min
  - MLD & BDD : 15 min

- ### Site : 

  - #### Login user : 1h
    - affichage login : 30min
    - request login : 30min

  - #### Menu : 2h30
    - affichage des filtres : 1h
    - creation de chaque filtres : 1h30

  - #### Liste des plats : 2h
    - afficher tout les plats : 1h
    - ajout au panier : 1h

  - #### Panier : 3h30
    - afficher le panier : 1h30
    - calcule des prix : 1h
    - modifier le nombre de plat : 1h

- ### Bug/Test : 3h

# Structure des fichiers :

```
Cuisine
    public/
        index.php
        style.css
        img/
    src/
        Controllers/
            UserController.php
            BlogController.php
        Models/
            User.php
            Post.php
            UserManager.php
            PostManager.php
        Views/
            404.php
            layout.php
            Auth/
                login.php
                register.php
            Post/
                index.php
                show.php
                create.php
        Router.php
        Route.php
        Helper.php
        Validator.php
```

## Etape 2 - Composer et l'autoloading

- Initialiser le dossier comme étant un projet composer

```shell
$ composer install # install l'autoloader
```

- Réinitialiser l'autoloader

```shell
$ composer dump-autoload
```

lancer ces deux commandes puis aller ici -> http://localhost:8000/
```
cd public
php -S localhost:8000
```

