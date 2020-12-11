# tuto-tdd-php

## Run the project

Pour lancer le projet : `php -S localhost:3000` et accéder au site via l'URL [localhost:3000/index.php?name=Mushu](localhost:3000/index.php?name=Mushu)

## Dev

Librairies pour les tests unitaires PHP :

- **PHP Unit** [phpunit/phpunit](https://packagist.org/packages/phpunit/phpunit) qui permet de run des tests `./vendor/bin/phpunit tests --colors=always`
- **PHP Unit Watcher** [spatie/phpunit-watcher](https://packagist.org/packages/spatie/phpunit-watcher) qui permet de run les tests automatiquement à chaque sauvegarde de fichier : `./vendor/bin/phpunit-watcher watch --colors=always`

```shel
composer require phpunit/phpunit spatie/phpunit-watcher --dev
```

## Les règles d'écriture d'un test unitaire

1. Situation initiale : **Given** (Etant donné que...).
2. Action qui va perturbation  : **When** (Quand...).
3. Résultat : **Then** (Alors...).