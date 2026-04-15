<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - FDF | Fou De Foot</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../Prestation/prestation.php">Prestations</a></li>
                <li><a href="../Connexion/connexion.php">Connexion</a></li>
                <li><a href="login.php" class="btn btn-primary" style="margin-left: 1rem;">S'inscrire</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="form-card">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = htmlspecialchars($_POST['email']);
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                echo "<div class='alert alert-success'>BIENVENUE CHEZ NOUS : $prenom $nom ($email)<br><a href='login.php'>[ RETOUR ]</a></div>";
            }
            ?>

            <h2>✍️ Inscription</h2>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" placeholder="votre@email.fr" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe *</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="form-group">
                    <label for="nom">Nom *</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom *</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
                </div>

                <div class="form-group">
                    <label>Genre</label>
                    <div style="display: flex; gap: 1.5rem; margin-top: 0.5rem; font-weight: 600;">
                        <label style="text-transform: none; font-size: 1rem;"><input type="radio" name="genre" value="H" required> Homme</label>
                        <label style="text-transform: none; font-size: 1rem;"><input type="radio" name="genre" value="F"> Femme</label>
                        <label style="text-transform: none; font-size: 1rem;"><input type="radio" name="genre" value="A"> Autre</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                    Valider l'inscription
                </button>
            </form>

            <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 3px solid var(--gris-clair);">
                <p style="color: var(--gris-beton); font-weight: 500;">
                    Déjà un compte ?<br>
                    <a href="../Connexion/connexion.php" style="color: var(--vert-terrain); font-weight: 700; text-decoration: none; font-size: 1.1rem; margin-top: 0.5rem; display: inline-block;">
                        Se connecter →
                    </a>
                </p>
            </div>
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
                <p><a href="../Prestation/prestation.php">Prestations</a></p>
                <p><a href="../Connexion/connexion.php">Connexion</a></p>
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
