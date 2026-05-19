<?php
$host = 'localhost';
$dbname = 'fdf';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    die("Erreur de connexion a la base de donnees. Verifiez que MySQL est allume dans XAMPP.");
}
?>