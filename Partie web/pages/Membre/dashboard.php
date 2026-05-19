<?php
session_start();

if (!isset($_SESSION['adherent_id'])) {
    header('Location: ../Connexion/connexion.php');
    exit();
}

require_once '../../database.php';

$id_adherent = $_SESSION['adherent_id'];
$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];

$sql = "SELECT SEANCE.date_seance, SEANCE.heure_debut, SEANCE.heure_fin, PRESTATION.description, PRESTATION.prix
        FROM RESERVATION
        INNER JOIN SEANCE ON RESERVATION.id_seance = SEANCE.id_seance
        INNER JOIN PRESTATION ON SEANCE.code_prestation = PRESTATION.code_prestation
        WHERE RESERVATION.id_adherent = ?
        ORDER BY SEANCE.date_seance ASC";

$requete = $pdo->prepare($sql);
$requete->execute([$id_adherent]);
$reservations = $requete->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Espace - FDF</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../Prestation/prestation.php">Prestations</a></li>
                <li><a href="../Connexion/deconnexion.php" style="color: red;">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="padding-top: 2rem;">
        <h1>Mon Espace Personnel</h1>
        <p>Bienvenue, <strong><?php echo $prenom . ' ' . $nom; ?></strong> ! Voici vos réservations.</p>
        <hr>
        <h2>Mes Séances à venir</h2>

        <?php if (count($reservations) == 0) { ?>
            <p>Vous n'avez aucune réservation pour le moment.</p>
        <?php } else { ?>
            <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                <tr style="background-color: #f2f2f2;">
                    <th>Date</th><th>Début</th><th>Fin</th><th>Prestation</th><th>Prix</th>
                </tr>
                <?php foreach ($reservations as $r) { ?>
                <tr>
                    <td><?php echo $r['date_seance']; ?></td>
                    <td><?php echo $r['heure_debut']; ?></td>
                    <td><?php echo $r['heure_fin']; ?></td>
                    <td><?php echo $r['description']; ?></td>
                    <td><?php echo $r['prix']; ?> €</td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</body>
</html>