## Organisation

- backlog

- envisager les sprints -> répartir sur les 4 prochains sprinits (1sprint = 2 semaines)

- préciser  le sprint 1 -> kanban -> 1 savoir quelles sont les tâches de la semaine + éléments de présentation



## Responsabilités de classes

App -> conteneur de l'ensemble des constantes, services, helpers... utiles à travers l'application.

Controller -> responsables de la génération des pages, plus précisément $response = Controller::function($request)

BaseController -> le controlleur de base duquel héritent les controlleurs réels de notre app. Il centralise les fonctionnalités partagées par tous les controlleurs.

AuthController -> toutes les pages liées à User / Auth

AppController ->toutes les autres pages (pour  l'instant)

Movie -> un film (card) et fonction hydrate

MoviesManager -> opérations BDD sur les films (view_all_movies, add_movie, delete_movie etc...)

load.php -> autoload des classes (APP notemment) et load de 'vendor/autoload.php' (twig?)

Twig -> moteur de templating pour afficher la vue de la page

## Structure sans routeur

/proj

    /classes: ensemble des classes de l'app + dossier configuré pour autoload.php

    /database: script SQL de création et gestion (backup) de laBDD

    /templates: Twig

    /assets

        /posters

        /avatars

        /...

    index.php

    login.php etc...: les pages de l'app qui appelent leur controlleur respectifs

## Structure si routeur

/proj

    /config (définir les routes URL + Ctrl function)

    /classes (toutes les classes principales du projet)

    /templates

    /public (index.php ->front Ctrl pour utilisation du routeur 
    .htaccess pour accès public)

    .htaccess (s'occupeentre autre de la réécriture d'URL ex:public/

    index.php + la bonne route pour  le routeur)