Présentation du projet et spécificités technique

Movies Manager est une interface web de gestion de films qui se base sur les données rentrées par l’utilisateur.
Movie Manager est destiné dans un premier temps à rentrer les données d'un film manuellement via un formulaire puis les stocker en base de données. La restitution de tous les films présents en base de donnée se fait via la page d'accueil. 
 
Quelle est l'utilitée de movie manager ?

Pour ce projet j’ai choisi d’utiliser pour :
-La partie front-end : HTML, CSS, Bootstrap, Twig
-La partie back-end : Apache, PHP, MySQL

Interface utilisateur:
L’interface se compose d’une page d’accueil qui donne la liste des films (sous forme de cartes) disponible en BDD.
Toutes les pages disposent d’une barre de navigation adaptable qui donne accès ou non à certaines fonctionnalités comme l’enregistrement d’un compte utilisateur, la connexion, l’ajout d’un film et la visualisation / modification du profile.
La liste des films reprend les informations de base (titre, année, tag). En cliquant sur une carte on accède via une fenêtre modale aux informations détaillées (titre, année, tag, acteur principal, réalisateur, synopsis).

Fonctionnalités:
Le barre de navigation s’adapte au statu de l’utilisateur qui peut être soit connecté ou anonyme.
Un utilisateur anonyme peut :
-voir la liste des films et lire les informations associées
-créer un compte
-se connecter à son compte

Un utilisateur connecté peut :
-voir la liste des films et lire les informations associées
-ajouter un film
-modifier les informations d'un film
-supprimer un film
-voir son profile
-Editer son profile
-Se déconnecter
-Supprimer son compte 

Web mobile et responsive:
Une grande partie du responsive design est gérée par Bootstrap qui s'appuie lui-même sur CSS Grid et Flexbox.
Accéssibilité

Back-end:
La partie back-end est construite autour du stack Apache, PHP, MySQL (uWamp sur clé usb).
J’ai choisis de ne pas utiliser de Framework Back-end pour m’exercer au PHP et travailler la Programmation orientée objet (POO). En effet, la POO est utilisée par de nombreux framework et est une façon de programmer assez abstraite bien que très populaire. Ce projet me permettra de comprendre plus facilement les choix d'implémentation lors de l'abord d'un framework.
Ayant du mal à m'aproprier les notions de POO un projet représentant un challenge m'a paru une bonne manière d'attaquer frontalement la POO et élargir ma zone de confort.

La base de données se compose de 3 tables :
-accounts, pour gérer les utilisateurs et les informations de compte
-movies, référence les films et les informations associées
-sessions, pour la gestion des sessions de chaque utilisateur