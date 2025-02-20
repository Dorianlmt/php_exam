# Projet : Site E-Commerce avec Symfony

## Description
Ce projet consiste en la création d'un site e-commerce complet utilisant le framework PHP Symfony. Il permet la gestion des utilisateurs, des produits, des commandes et inclut un panier d'achat ainsi qu'une interface d'administration.

## Fonctionnalités principales
- **Gestion des utilisateurs** :
  - Inscription et connexion sécurisées
  - Profil utilisateur avec gestion des informations personnelles
  - Solde utilisateur et historique des commandes

- **Gestion des produits** :
  - Ajout et modification de produits
  - Affichage des produits avec système de tri
  - Détails complets des produits

- **Panier et commandes** :
  - Ajout/retrait d'articles au panier
  - Validation de commande avec génération de facture
  - Gestion des stocks

- **Administration** :
  - Gestion complète des utilisateurs et produits
  - Tableau de bord administrateur

## Installation

### Prérequis
- PHP 8.0 ou supérieur
- Composer
- Symfony CLI
- Base de données MySQL (utilisation de Wamp ou Xampp)

### Étapes d'installation
1. Cloner le dépôt :
   ```bash
   git clone https://https://github.com/Dorianlmt/php_exam/
   ```
2. Installer les dépendances :
   ```bash
   composer install
   ```
3. Configurer l'environnement :
   - Créer un fichier `.env.local` à partir de `.env`
   - Configurer les accès à la base de données

4. - Importer la base de donnée `db_exam_php.sql` dans votre Wamp (nous appellerons l'environnement pour phpmyadmin Wamp jusqu'à la fin du document)

5. Lancer le serveur :
   ```bash
   symfony serve
   ```

## Structure de la base de données
Le système utilise les tables principales suivantes :
- Table Users
- Table Articles
- Table Commandes
- Table Cart
- Table Invoices
- Table Stocks

## Utilisation

### Créer un compte Utilisateur
- Se rendre sur la page de connexion
- Cliquer sur "S'inscrire"
- Remplir les champs obligatoires (email, mot de passe). L'utilisation d'un mot de passe sécurisé est nécessaire, à savoir 8 caractères minimum, 1 majuscule, 1 minuscule, 1 chiffre.
- Procéder à l'inscription.

### Naviguer dans le site
L'utilisation du site est faite pour que les utilisateurs n'aient pas besoin de chercher difficilement : les articles peuvent être filtrés, et classés par catégories. Une barre de recherche est tout de même disponible pour plus de confort.

### Accéder au panier 
Cliquer sur l'icône `panier`. Vous serez redirigé vers les articles que vous avez ajoutés au panier. Etant donné que nous n'utilisons pas une vraie monnaie pour le site, nous avons attribué 100 crédits à la création du compte. Commander les articles vous coûtera donc le nombre de crédits affiché. Après la commande, une facture sera générée

### Page de compte 
Cliquer sur l'icône `compte`. Vous serez redirigé vers votre page de compte. Vous pouvez y voir vos commandes passées, et les factures qui y sont liées. Vous pouvez également modifier votre mot de passe, nom d'utilisateur, photo de profil. Une limite de taille de 5Mo est appliquée pour la photo de profil. Vous pouvez vous déconnecter par le bouton `Déconnexion`. 

### /!\ Partie Administrateur /!\

En vous connectant via un compte administrateur, vous aurez la possibilité d'ajouter ou retirer un article de la base de donnée. Vous pourrez faire cela depuis l'onglet `administrateur` qui vous donne accès à la page de gestion des articles. Vous pouvez également modifier les informations d'un article existant.
Cette partie n'est pas accessible aux utilisateurs normaux.

## Contribution

Projet réalisé par Damien, Dorian, Samuel, Mamoune et Adrien.
