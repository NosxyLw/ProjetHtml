<?php
// 1. Définition des variables de connexion (Version simple)
$host = 'localhost';
$dbname = 'fdf';
$user = 'root';
$pass = ''; // Vide sous XAMPP/WAMP par défaut

try {
    // 2. Connexion à la base de données MySQL via PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    // 3. Affichage simple des erreurs SQL (Très utile pour le développement)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) {
    // 4. Si MySQL est éteint ou introuvable, on arrête tout
    die("Erreur de connexion à la base de données. Vérifiez que MySQL est allumé dans XAMPP.");
}
?>