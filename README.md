# Full Champions Ultimate Team - Backend

## Introduction
Full Champions Ultimate Team est une plateforme backend robuste pour gérer les joueurs, équipes, nationalités et autres entités liées. Cette documentation vise à fournir des instructions claires pour configurer, comprendre, et utiliser la plateforme.

---

## Fonctionnalités Principales

### 1. Analyse et Optimisation des Données
- Analyse approfondie d’un fichier JSON pour créer une base de données normalisée.
- Prise en charge des entités comme joueurs, équipes, et nationalités.
- Structures relationnelles pour minimiser la redondance.

### 2. Gestion des Entités
- Ajouter, modifier, supprimer, et lister les entités.
- Associer un joueur à une équipe et à une nationalité.

### 3. Tableau de Bord et Statistiques
- Tableau de bord dynamique pour visualiser les données clés.
- Intégration de graphiques interactifs (Chart.js).

### 4. Internationalisation (i18n)
- Système multilingue.
- Fichiers de langue (ex. fr.php, en.php, es.php).
- Option de changement de langue via le tableau de bord.

### 5. Documentation des Scripts
- Commentaires clairs dans le code.
- Fichier README pour expliquer la configuration.

### 6. Bonus
- Opérations AJAX pour des actions sans rechargement.
- Modals pour une navigation fluide.
- Visualisation interactive des statistiques.

---

## Prérequis

1. **Serveur Web** : Apache ou Nginx.
2. **PHP** : Version 7.4 ou supérieure.
3. **Base de données** : MySQLi.
4. **Bibliothèques** : 
   - Chart.js (pour les graphiques).
   - AJAX (JavaScript).

---

## Installation

### 1. Cloner le projet
```bash
git clone https://github.com/your-repo/FullChampions.git
```

### 2. Configurer la base de données
- Importer le fichier `database.sql` dans votre serveur MySQL.
- Configurer les paramètres dans `config.php` :
  ```php
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'full_champions');
  define('DB_USER', 'root');
  define('DB_PASS', 'password');
  ```

### 3. Configurer les fichiers de langue
- Ajouter vos fichiers de langue dans le dossier `languages/`.
- Exemple :
  ```php
  // fr.php
  return [
      'welcome' => 'Bienvenue',
      'player' => 'Joueur',
  ];
  ```

### 4. Lancer le projet
- Accédez à `http://localhost/full-champions` dans votre navigateur.

---

## Utilisation

### Gestion des Joueurs
1. **Ajouter un joueur** : Formulaire pour entrer les détails du joueur.
2. **Modifier un joueur** : Mettre à jour les informations existantes.
3. **Supprimer un joueur** : Retirer un joueur de la base.
4. **Lister les joueurs** : Afficher les joueurs enregistrés.

### Gestion des Équipes
1. Ajouter, modifier, et supprimer des équipes.
2. Associer des joueurs aux équipes.

### Tableau de Bord
- Visualiser les statistiques des joueurs et des équipes.
- Graphiques pour la répartition par nationalité.

---

## Fonctionnalités AJAX
- Validation sans rechargement des formulaires.
- Mise à jour dynamique des listes de joueurs et équipes.

---

## Bonus
- Utilisation de modals pour une gestion intuitive des entités.
- Personnalisation facile via les fichiers de langue.

---


## Auteur
- **Yahya Afadisse**


