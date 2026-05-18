<?php
// 1. On reprend la session en cours pour pouvoir la modifier
session_start();

// 2. On vide totalement le tableau des variables de session
// Cela supprime ton 'adherent_id', ton 'prenom' et ton 'est_admin'
$_SESSION = [];

// 3. On détruit définitivement la session côté serveur
session_destroy();

// 4. Redirection vers la page d'accueil du site
header("Location: ../../index.php");

// 5. Arrêt strict du script
exit();
?>