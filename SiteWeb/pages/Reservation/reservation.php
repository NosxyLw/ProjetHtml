<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - FDF | Fou De Foot</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../Prestation/prestation.php">Mon espace</a></li>
                <li><a href="../Connexion/connexion.php">Connexion</a></li>
                <li><a href="../Login/login.php" class="btn btn-primary" style="margin-left: 1rem;">S'inscrire</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="form-card">
            <h2>🏟 Réserver un terrain</h2>

            <form action="traitement.php" method="POST">
                <div class="form-group">
                    <label for="nom_client">Nom du capitaine *</label>
                    <input type="text" id="nom_client" name="nom_client" placeholder="Votre nom" required>
                </div>

                <div class="form-group">
                    <label for="date_match">Date du match *</label>
                    <input type="date" id="date_match" name="date_match" required>
                </div>

                <div class="form-group">
                    <label for="terrain">Terrain *</label>
                    <select id="terrain" name="terrain" required>
                        <option value="">-- Choisissez un terrain --</option>
                        <option value="terrain_a">Terrain A (Synthétique)</option>
                        <option value="terrain_b">Terrain B (Pelouse naturelle)</option>
                        <option value="terrain_c">Terrain C (Indoor / Five)</option>
                        <option value="stade_honneur">Stade d'Honneur</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nb_joueurs">Nombre de joueurs</label>
                    <input type="number" id="nb_joueurs" name="nb_joueurs" min="2" max="15" value="10">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                    Valider la réservation
                </button>
            </form>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>FOU DE FOOT</h3>
                <p>Votre club de futsal préféré depuis 2020.</p>
            </div>
            <div class="footer-section">
                <h3>Navigation</h3>
                <p><a href="../../index.php">Accueil</a></p>
                <p><a href="../Prestation/prestation.php">Mon espace</a></p>
                <p><a href="reservation.php">Réservation</a></p>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>📞 <a href="tel:0123456789">01 23 45 67 89</a></p>
                <p>📧 <a href="mailto:contact@fdf.fr">contact@fdf.fr</a></p>
            </div>
            <div class="footer-section">
                <h3>Horaires</h3>
                <p>Lun-Ven: 9h-22h<br>Sam-Dim: 10h-20h</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 FOU DE FOOT - Tous droits réservés</p>
        </div>
    </footer>
</body>
</html>
