<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FDF - Fou De Foot | Accueil</title>
    <link rel="stylesheet" href="styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="pages/Prestation/prestation.php">Prestations</a></li>
                <?php if (isset($_SESSION['adherent_id'])) { ?>
                    <li><strong style="color: white;">👋 Bonjour, <?php echo $_SESSION['prenom']; ?></strong></li>
                    <li><a href="pages/Connexion/deconnexion.php" class="btn btn-danger">Déconnexion</a></li>
                <?php } else { ?>
                    <li><a href="pages/Connexion/connexion.php">Connexion</a></li>
                    <li><a href="pages/Login/login.php" class="btn btn-danger">S'inscrire</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>FUTSAL. PASSION. COMMUNAUTÉ.</h1>
            <p>Réservez vos créneaux, inscrivez-vous aux stages et participez aux tournois de la région.</p>
            <a href="pages/Prestation/prestation.php" class="btn btn-primary">Voir nos offres</a>
            <?php if (!isset($_SESSION['adherent_id'])) { ?>
                <a href="pages/Login/login.php" class="btn btn-secondary">Créer mon compte</a>
            <?php } ?>
        </div>
    </section>

    <div class="container">
        <h2>Nos Prestations Phares</h2>
        <div class="cards-grid">
            <div class="card">
                <h3>PRATIQUE LIBRE</h3>
                <p>Créneaux d'1h sur terrain professionnel.</p>
                <p><strong>8,00 € / séance</strong></p>
                <a href="pages/Reservation/reservation.php" class="btn btn-primary">Réserver</a>
            </div>
            <div class="card">
                <h3>STAGE ENFANT</h3>
                <p>5 jours intensifs avec encadrement (-14 ans).</p>
                <p><strong>60,00 € / stage</strong></p>
                <a href="pages/Reservation/reservation.php" class="btn btn-primary">Réserver</a>
            </div>
            <div class="card">
                <h3>TOURNOI ÉTÉ</h3>
                <p>Compétition inter-clubs format 5v5.</p>
                <p><strong>15,00 € / équipe</strong></p>
                <a href="pages/Reservation/reservation.php" class="btn btn-primary">Réserver</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div>
                <h3>FOU DE FOOT</h3>
                <p>15 Avenue du Sport, 75013 Paris</p>
            </div>
            <div>
                <h3>Contact</h3>
                <p>📞 01 23 45 67 89</p>
                <p>📧 contact@fdf.fr</p>
            </div>
        </div>
        <p style="text-align: center;">&copy; 2026 FOU DE FOOT - Tous droits réservés</p>
    </footer>
</body>
</html>