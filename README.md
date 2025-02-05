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


### Description des Dossiers et Fichiers

- **public/** : Ce dossier contient tous les fichiers accessibles publiquement via le navigateur, y compris le point d'entrée principal `index.php`. Il comprend aussi le fichier `.htaccess` pour la réécriture d'URL et la gestion de la sécurité.
  
- **app/** : Le cœur de l'application contenant la logique métier.
  - **controllers/** : Contient les contrôleurs, organisés par Front Office et Back Office. Les contrôleurs gèrent les requêtes des utilisateurs et appellent les modèles appropriés pour interagir avec les données.
  - **models/** : Contient les modèles, qui gèrent la logique d'accès aux données (par exemple, l'interaction avec la base de données PostgreSQL).
  - **views/** : Contient les fichiers Twig utilisés pour afficher les données de manière claire et structurée.
  - **core/** : Contient les classes principales pour la gestion des fonctionnalités de base du projet (routage, gestion des sessions, sécurité, etc.).
  - **config/** : Contient les fichiers de configuration de l'application, comme la configuration de la base de données et les définitions des routes.

- **logs/** : Dossier où les logs d’erreurs et d’accès sont enregistrés pour le débogage et la gestion des incidents.
  
- **vendor/** : Ce dossier contient toutes les dépendances gérées par Composer.

- **.env** : Fichier contenant les variables d'environnement pour des configurations sensibles (par exemple, les identifiants de base de données).

- **composer.json** : Fichier de configuration de Composer qui gère les dépendances PHP du projet.

- **.gitignore** : Liste les fichiers et répertoires qui ne doivent pas être suivis par Git, comme les fichiers temporaires et les configurations locales.

---

Cette architecture modulaire permet une grande flexibilité et une maintenance facile à long terme. Elle sépare clairement les différentes parties du projet (logique métier, gestion de la base de données, gestion de l'affichage), ce qui simplifie les évolutions futures et l'intégration de nouvelles fonctionnalités.


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


