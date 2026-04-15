<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FDF | Fou De Foot</title>
    <link rel="stylesheet" href="fdf-modern.css">
</head>
<body>
    <!-- NAVIGATION -->
    <nav>
        <div class="nav-container">
            <a href="index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php" class="btn btn-primary" style="margin-left: 1rem;">S'inscrire</a></li>
            </ul>
        </div>
    </nav>

    <!-- LOGIN FORM -->
    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="form-card">
            <h2>🔐 Connexion</h2>
            
            <!-- Affichage des messages d'information -->
            <?php if (isset($_GET['msg'])): ?>
                <?php if ($_GET['msg'] === 'non_connecte'): ?>
                    <div class="alert alert-info">
                        Vous devez être connecté pour accéder à cette page.
                    </div>
                <?php elseif ($_GET['msg'] === 'deconnecte'): ?>
                    <div class="alert alert-success">
                        Vous avez été déconnecté avec succès.
                    </div>
                <?php elseif ($_GET['msg'] === 'acces_refuse'): ?>
                    <div class="alert alert-error">
                        Accès réservé aux administrateurs.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Adresse Email *</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="votre@email.fr"
                        required 
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe *</label>
                    <input 
                        type="password" 
                        id="mot_de_passe" 
                        name="mot_de_passe" 
                        placeholder="••••••••"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                    Se connecter
                </button>
            </form>

            <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 3px solid var(--gris-clair);">
                <p style="color: var(--gris-beton); font-weight: 500;">
                    Pas encore de compte ?<br>
                    <a href="inscription.php" style="color: var(--vert-terrain); font-weight: 700; text-decoration: none; font-size: 1.1rem; margin-top: 0.5rem; display: inline-block;">
                        Créer un compte gratuitement →
                    </a>
                </p>
            </div>

            <!-- Compte de test -->
            <div style="margin-top: 2rem; padding: 1rem; background: rgba(255, 210, 63, 0.1); border: 2px solid var(--jaune-flash);">
                <p style="font-size: 0.85rem; color: var(--gris-beton); text-align: center;">
                    <strong>🔐 Comptes de test :</strong><br>
                    <span style="font-size: 0.75rem;">
                        Admin: admin@fdf.fr / admin123<br>
                        Adhérent: lucas@mail.fr / Test1234
                    </span>
                </p>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>FOU DE FOOT</h3>
                <p>Votre club de futsal préféré depuis 2020.</p>
            </div>
            <div class="footer-section">
                <h3>Navigation</h3>
                <p><a href="index.php">Accueil</a></p>
                <p><a href="prestations.php">Prestations</a></p>
                <p><a href="connexion.php">Connexion</a></p>
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
