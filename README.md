# Architecture MVC PHP - Projet Web Moderne

## Introduction

Ce projet a pour objectif de fournir une architecture MVC (Modèle-Vue-Contrôleur) moderne et modulaire, conçue pour être utilisée comme base pour diverses applications web. L'accent est mis sur la séparation des responsabilités, la réutilisabilité du code et l'application des meilleures pratiques en développement PHP.

L'architecture sera construite autour de composants essentiels, tels que la gestion avancée des routes, la sécurité renforcée et l'utilisation de services comme le moteur de templates Twig, le système d'authentification et la gestion des rôles et permissions.

---

## Fonctionnalités de l'Architecture

L'architecture MVC proposée inclut les fonctionnalités suivantes :

- ✅ **Gestion avancée des routes** avec un routeur personnalisé.
- ✅ **Connexion sécurisée à PostgreSQL** via PDO.
- ✅ **Séparation du Front Office et du Back Office**.
- ✅ **Système d'authentification sécurisé** (sessions, tokens, permissions).
- ✅ **Gestion des rôles et autorisations** (ACL).
- ✅ **Moteur de templates Twig** pour la gestion des vues.
- ✅ **Injection de dépendances** et gestion des services.
- ✅ **Sécurisation des requêtes SQL** contre les injections SQL et XSS.
- ✅ **Système de logs et gestion des erreurs**.
- ✅ **Utilisation des Design Patterns** (Repository Pattern, Service Container).
- ✅ **Classe Validator** pour la validation des données.
- ✅ **Classe Security** pour la protection contre CSRF, XSS et SQL Injection.
- ✅ **Classe Session** pour la gestion avancée des sessions.
- ✅ **Fichier .htaccess** pour la réécriture des URL et la sécurité.

---

## Structure du Projet

La structure des fichiers du projet est organisée comme suit :

/projet-mvc-php │── public/ # Dossier public (accessible via le navigateur) │ ├── index.php # Point d'entrée de l'application │ ├── .htaccess # Réécriture d'URL et sécurité │ ├── assets/ # Fichiers CSS, JS, images │ │── app/ # Code de l'application │ ├── controllers/ # Contrôleurs (Logique métier) │ │ ├── front/ # Contrôleurs Front Office │ │ │ ├── HomeController.php │ │ │ ├── ArticleController.php │ │ ├── back/ # Contrôleurs Back Office │ │ │ ├── DashboardController.php │ │ │ ├── UserController.php │ ├── models/ # Modèles (Gestion de la base de données) │ │ ├── User.php │ │ ├── Article.php │ ├── views/ # Fichiers templates pour les vues │ │ ├── front/ # Vues Front Office │ │ │ ├── home.twig │ │ │ ├── article.twig │ │ ├── back/ # Vues Back Office │ │ │ ├── dashboard.twig │ │ │ ├── users.twig │ ├── core/ # Classes principales de l'application │ │ ├── Router.php # Gestion des routes │ │ ├── Controller.php # Classe parent pour les contrôleurs │ │ ├── Model.php # Classe parent pour les modèles │ │ ├── View.php # Gestion des templates Twig │ │ ├── Database.php # Connexion PostgreSQL via PDO │ │ ├── Auth.php # Gestion des sessions et authentification │ │ ├── Validator.php # Validation des données │ │ ├── Security.php # Sécurisation contre XSS, CSRF, SQL Injection │ │ ├── Session.php # Gestion avancée des sessions │ ├── config/ # Configuration de l'application │ │ ├── config.php # Configuration de la base de données │ │ ├── routes.php # Définition des routes │── logs/ # Logs d'erreurs et d’accès │── vendor/ # Dépendances (si usage de Composer) │── .env # Variables d’environnement │── composer.json # Gestionnaire de dépendances PHP │── .gitignore # Fichiers à ignorer par Git


---

## Meilleures Pratiques et Points Clés

### 1️⃣ Séparation des Responsabilités

- **Front Office** : Gère la partie publique du site, accessible par tous les utilisateurs.
- **Back Office** : Réservé aux administrateurs, nécessite une authentification et des contrôles d'accès stricts.

### 2️⃣ Sécurisation et Validation des Données

- **Protection CSRF** : Mise en place de tokens pour éviter les attaques Cross-Site Request Forgery.
- **Validation des Entrées Utilisateur** : Classe `Validator.php` pour s'assurer que toutes les données entrées par les utilisateurs sont correctes.
- **Protection XSS et SQL Injection** : Classe `Security.php` pour se prémunir contre les attaques Cross-Site Scripting et les injections SQL.

### 3️⃣ Architecture Modulaire et Extensible

- Utilisation de classes abstraites pour une réutilisation optimale du code.
- Possibilité d'intégrer facilement d'autres bases de données en modifiant uniquement le driver de connexion.

### 4️⃣ Utilisation du Moteur de Templates

- **Twig** est utilisé pour séparer la logique de l'affichage, ce qui permet une meilleure gestion des vues et une plus grande clarté du code.

### 5️⃣ Gestion des Sessions et de l'Authentification

- La **classe `Session.php`** gère la sécurité et la persistance des sessions utilisateurs.
- La **classe `Auth.php`** assure la gestion des utilisateurs et de leurs permissions à travers un système sécurisé.

### 6️⃣ Utilisation du Fichier `.htaccess`

- Le fichier `.htaccess` permet de rediriger toutes les requêtes vers `index.php` pour un système de routage centralisé.
- Il protège également les fichiers sensibles (comme `.env`) en restreignant l'accès.

---


### Prérequis

- PHP 7.4 ou supérieur
- PostgreSQL
- Composer (pour la gestion des dépendances)


