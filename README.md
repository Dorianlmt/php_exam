# 📦 Projet E-Commerce avec Symfony

## 📝 Description
Ce projet est un site de e-commerce développé avec **Symfony** dans le cadres de nos ymmersion en 2ème année. 

Il permet aux utilisateurs de s'inscrire, de se connecter, d'acheter et de vendre des articles. Un système d'administration permet de gérer les utilisateurs et les articles.

Nous avons donc réalisés `TechNova` qui est un site de vente de matériel électronique (claviers, souris, écrans, ...)
![logo](https://i.imgur.com/IOpRPW4.png)



## 🚀 Fonctionnalités
### 🔹 Utilisateurs
   - Inscription et connexion sécurisées
   - Profil utilisateur avec gestion des informations personnelles
   - Solde utilisateur et historique des commandes

### 🔹 Articles
  - Ajout et modification de produits
  - Affichage des produits avec système de tri
  - Détails complets des produits

### 🔹 Panier et commandes
  - Ajout/retrait d'articles au panier
  - Validation de commande avec génération de facture
  - Gestion des stocks

### 🔹 Administration
  - Gestion des utilisateurs et des articles
  - Tableau de bord administrateur

## Technologies utilisées
- **Backend** : Symfony (PHP)
- **Frontend** : Twig, TailwindCSS
- **Base de données** : MySQL avec Doctrine

## 🛠️ Installation
### 1️⃣ Prérequis
- PHP 8.x
- Composer
- Symfony CLI
- MySQL (Wamp ou Xampp)

### 2️⃣ Cloner le projet
```bash
git clone https://github.com/Dorianlmt/php_exam/
cd php_exam
```

### 3️⃣ Installer les dépendances
```bash
composer install
```

```bash
composer require symfony/console
```

### 4️⃣ Configurer l'environnement
Créer un fichier `.env.local` et y ajouter le contenu du `.env`.

Il faudra modifier la ligne suivante en remplacant `IDENTIFIANT` ainsi que `PASSWORD`:
```env
DATABASE_URL="mysql://IDENTIFIANT:PASSWORD@127.0.0.1:3306/php_exam_db?serverVersion=8.0.32&charset=utf8mb4"

```

### 5️⃣ Créer la base de données
  - Importer la base de donnée `db_exam_php.sql` dans votre phpmyadmin

### 6️⃣ Lancer le serveur symfony et TailwindCSS
Lancement de symfony :
```bash
symfony server:start
```
Lancement de Tailwind :
```bash
symfony console tailwind:build --watch
```

**Et voilà vous pouvez accéder au site sur : `http://127.0.0.1:8000`**


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
L'utilisation du site est faite pour que les utilisateurs n'aient pas besoin de chercher difficilement : Une barre de recherche disponible pour plus de confort.

### Accéder au panier 
Cliquer sur l'icône `panier`. Vous serez redirigé vers les articles que vous avez ajoutés au panier. Après la commande, une facture sera générée

### Page de compte 
Cliquer sur l'icône de `compte`. Vous serez redirigé vers votre page de compte. Vous pouvez y voir vos commandes passées, et les factures qui y sont liées. Vous pouvez également modifier votre mot de passe, nom d'utilisateur, photo de profil. Vous pouvez vous déconnecter par le bouton `Déconnexion`. 

### /!\ Partie Administrateur /!\

En vous connectant via un compte administrateur, vous aurez la possibilité d'ajouter ou retirer un article de la base de donnée. Vous pourrez faire cela depuis l'onglet `administrateur` qui vous donne accès à la page de gestion des articles. Vous pouvez également modifier les informations d'un article existant.
Cette partie n'est pas accessible aux utilisateurs normaux.

## Contribution

Projet réalisé par Damien, Dorian, Samuel, Mamoune et Adrien.
