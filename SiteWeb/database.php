<?php
// Définition des variables d'environnement
define('DB_HOST', 'localhost'); // Adresse du serveur MySQL (localhost = sur la même machine)

define('DB_NAME', 'fdf'); // Nom de la base de données créée dans phpMyAdmin

define('DB_USER', 'root'); // Utilisateur MySQL par défaut sous XAMPP

define('DB_PASS', ''); // Mot de passe vide par défaut sous XAMPP

define('DB_CHARSET', 'utf8mb4'); // Encodage UTF-8 étendu (supporte les emojis et accents)

try {


// new PDO() crée une connexion à MySQL

// Le 1er argument est le DSN (Data Source Name) : une chaîne qui identifie la BDD

// Les arguments 2 et 3 sont l'utilisateur et le mot de passe

// Le 4ème argument est un tableau d'options (comportement de PDO)

$pdo = new PDO(

'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET,

DB_USER,

DB_PASS,

[

// Si une requête SQL échoue, PDO lève une exception au lieu de retourner false

// Cela force le développeur à gérer les erreurs proprement

PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,


// Chaque ligne récupérée sera un tableau associatif php

// Ex: $row['nom'] au lieu de $row[0]

PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,


// Désactive les requêtes préparées simulées

// Plus sécurisé : les données passent réellement par le protocole MySQL

PDO::ATTR_EMULATE_PREPARES => false,

]

);


} catch (PDOException $e) {

// PDOException est l'exception spécifique aux erreurs PDO

// die() arrête l'exécution du script et affiche le message

// En production, ne jamais afficher le message d'erreur brut (risque sécurité)

// Ici on le laisse pour faciliter le débogage en BTS

die('Erreur de connexion à la base de données : ' . $e->getMessage());

}

// $pdo est maintenant disponible dans tout fichier qui inclut config/db.php