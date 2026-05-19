<?php
session_start();
require_once '../../database.php';

if (!isset($_SESSION['adherent_id'])) {
    header('Location: ../Connexion/connexion.php');
    exit();
}

if (isset($_POST['id_seance'])) {
    $id_adherent = $_SESSION['adherent_id'];
    $id_seance = $_POST['id_seance'];

    $verification = $pdo->prepare("SELECT * FROM RESERVATION WHERE id_adherent = ? AND id_seance = ?");
    $verification->execute([$id_adherent, $id_seance]);

    if ($verification->rowCount() > 0) {
        header("Location: reservation.php?erreur=1");
        exit();
    } else {
        $insertion = $pdo->prepare("INSERT INTO RESERVATION (id_adherent, id_seance) VALUES (?, ?)");
        $insertion->execute([$id_adherent, $id_seance]);
        header("Location: ../Membre/dashboard.php");
        exit();
    }
}
?>