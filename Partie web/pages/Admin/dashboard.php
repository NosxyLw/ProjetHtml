<?php
session_start();
require_once '../../database.php';

if (!isset($_SESSION['est_admin']) || $_SESSION['est_admin'] == 0) {
    header('Location: ../../index.php');
    exit();
}

$reqPresta = $pdo->query("
    SELECT * FROM PRESTATION
    INNER JOIN TYPE_PRESTATION ON PRESTATION.id_type = TYPE_PRESTATION.id_type
");
$prestations = $reqPresta->fetchAll();

$reqSeance = $pdo->query("
    SELECT * FROM SEANCE
    INNER JOIN PRESTATION ON SEANCE.code_prestation = PRESTATION.code_prestation
    ORDER BY date_seance ASC
");
$seances = $reqSeance->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - FDF</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FDF ADMIN</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Retour au site</a></li>
                <li><a href="../Connexion/deconnexion.php" class="btn btn-danger">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Espace Responsable</h1>
        <p>Bienvenue, <?php echo $_SESSION['prenom']; ?>. Vous avez les droits d'administration.</p>
        <hr>

        <h2>Gestion des Prestations</h2>
        <a href="ajouter_prestation.php" class="btn btn-primary">Ajouter une prestation</a>

        <table border="1" width="100%" cellpadding="10" style="margin-top: 15px; border-collapse: collapse;">
            <tr style="background-color: #f2f2f2;">
                <th>Code</th><th>Type</th><th>Prix</th><th>Places</th><th>Actions</th>
            </tr>
            <?php foreach ($prestations as $p) { ?>
            <tr>
                <td><?php echo $p['code_prestation']; ?></td>
                <td><?php echo $p['libelle_type']; ?></td>
                <td><?php echo $p['prix']; ?> €</td>
                <td><?php echo $p['nb_places_max']; ?></td>
                <td><a href="supprimer_prestation.php?code=<?php echo $p['code_prestation']; ?>" style="color: red;">Supprimer</a></td>
            </tr>
            <?php } ?>
        </table>

        <br><br>

        <h2>Planning des Séances</h2>
        <a href="ajouter_seance.php" class="btn btn-primary">Planifier une séance</a>

        <table border="1" width="100%" cellpadding="10" style="margin-top: 15px; border-collapse: collapse;">
            <tr style="background-color: #f2f2f2;">
                <th>Date</th><th>Horaires</th><th>Prestation</th>
            </tr>
            <?php foreach ($seances as $s) { ?>
            <tr>
                <td><?php echo $s['date_seance']; ?></td>
                <td><?php echo $s['heure_debut']; ?> à <?php echo $s['heure_fin']; ?></td>
                <td><?php echo $s['description']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>