<?php
// 1. Démarrage de la session (pour récupérer l'ID de l'adhérent)
session_start();

// 2. Connexion à la base de données
require_once '../../database.php';

// 3. SÉCURITÉ DE BASE : Si le visiteur n'est pas connecté, on le renvoie au login
if (!isset($_SESSION['adherent_id'])) {
    header('Location: ../Connexion/connexion.php');
    exit();
}

// 4. TRAITEMENT DU FORMULAIRE : On vérifie si le bouton a bien été cliqué
if (isset($_POST['id_seance'])) {
    
    // On récupère les deux informations nécessaires
    $id_adherent = $_SESSION['adherent_id']; // Vient de la mémoire du serveur
    $id_seance = $_POST['id_seance'];        // Vient du formulaire HTML

    // ÉTAPE A : Vérification des doublons (A-t-il déjà réservé ?)
    $verification = $pdo->prepare("SELECT * FROM RESERVATION WHERE id_adherent = ? AND id_seance = ?");
    $verification->execute([$id_adherent, $id_seance]);

    // La fonction rowCount() compte le nombre de lignes trouvées
    if ($verification->rowCount() > 0) {
        // L'utilisateur a déjà une réservation pour cette séance
        // On le renvoie sur la page de réservation avec une erreur simple dans l'URL
        header("Location: reservation.php?erreur=1");
        exit();
        
    } else {
        // ÉTAPE B : S'il n'y a pas de doublon, on enregistre la réservation
        $insertion = $pdo->prepare("INSERT INTO RESERVATION (id_adherent, id_seance) VALUES (?, ?)");
        $insertion->execute([$id_adherent, $id_seance]);

        // Une fois l'enregistrement terminé, on l'envoie sur son espace personnel
        header("Location: ../Membre/dashboard.php");
        exit();
    }
}
?>