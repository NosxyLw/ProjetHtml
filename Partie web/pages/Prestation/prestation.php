<?php
session_start();
require_once '../../database.php';

$est_admin = 0;
if (isset($_SESSION['est_admin']) && $_SESSION['est_admin'] == 1) {
    $est_admin = 1;
}

$requeteTypes = $pdo->query("SELECT * FROM TYPE_PRESTATION");
$types = $requeteTypes->fetchAll();

if (isset($_GET['type'])) {
    $id_filtre = $_GET['type'];
    $sql = "SELECT * FROM PRESTATION
            INNER JOIN TYPE_PRESTATION ON PRESTATION.id_type = TYPE_PRESTATION.id_type
            WHERE PRESTATION.id_type = ?";
    $requetePresta = $pdo->prepare($sql);
    $requetePresta->execute([$id_filtre]);
} else {
    $sql = "SELECT * FROM PRESTATION
            INNER JOIN TYPE_PRESTATION ON PRESTATION.id_type = TYPE_PRESTATION.id_type";
    $requetePresta = $pdo->query($sql);
}

$prestations = $requetePresta->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Prestations - FDF</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="prestation.php">Prestations</a></li>
                <?php if (isset($_SESSION['adherent_id'])) { ?>
                    <li><a href="../Membre/dashboard.php">Mon Espace</a></li>
                    <li><a href="../Connexion/deconnexion.php" style="color: red;">Déconnexion</a></li>
                <?php } else { ?>
                    <li><a href="../Connexion/connexion.php">Connexion</a></li>
                    <li><a href="../Login/login.php" class="btn btn-primary">S'inscrire</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container" style="padding-top: 2rem;">
        <h1 style="text-align: center;">Notre Catalogue Futsal</h1>

        <div style="text-align: center; margin-bottom: 30px;">
            <a href="prestation.php" class="btn btn-secondary">Toutes les offres</a>
            <?php foreach ($types as $t) { ?>
                <a href="prestation.php?type=<?php echo $t['id_type']; ?>" class="btn btn-primary">
                    <?php echo $t['libelle_type']; ?>
                </a>
            <?php } ?>
        </div>

        <hr>

        <div class="cards-grid" style="margin-top: 30px;">
            <?php if (count($prestations) == 0) { ?>
                <p>Aucune offre disponible pour cette catégorie.</p>
            <?php } ?>

            <?php foreach ($prestations as $presta) { ?>
                <div class="card">
                    <div style="background-color: #f2f2f2; padding: 10px; text-align: center;">
                        <h3><?php echo $presta['libelle_type']; ?></h3>
                        <?php if ($presta['age_limite'] > 0) { ?>
                            <span style="color: red;">Âge max : <?php echo $presta['age_limite']; ?> ans</span>
                        <?php } else { ?>
                            <span style="color: green;">Tout public</span>
                        <?php } ?>
                    </div>
                    <div style="padding: 15px;">
                        <p><?php echo $presta['description']; ?></p>
                        <p><strong>Réf :</strong> <?php echo $presta['code_prestation']; ?></p>
                        <p><strong>Places :</strong> <?php echo $presta['nb_places_max']; ?> max</p>
                        <h2 style="text-align: center; color: #ffaa00;"><?php echo $presta['prix']; ?> €</h2>
                    </div>
                    <div style="padding: 15px; text-align: center; border-top: 1px solid #ccc;">
                        <?php if ($est_admin == 1) { ?>
                            <a href="../Admin/modifier_prestation.php?code=<?php echo $presta['code_prestation']; ?>" class="btn btn-secondary">Modifier</a>
                            <a href="../Admin/supprimer_prestation.php?code=<?php echo $presta['code_prestation']; ?>" class="btn btn-danger">Supprimer</a>
                        <?php } else { ?>
                            <a href="../Reservation/reservation.php?code=<?php echo $presta['code_prestation']; ?>" class="btn btn-primary">Réserver cette séance</a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>