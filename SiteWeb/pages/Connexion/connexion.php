<?php
// 1. SUPPRESSION du var_dump() qui détruisait le routage HTTP
require_once '../../database.php';

// 2. Démarrage immédiat de la session
session_start();

$erreur = ''; // Initialisation propre de la variable d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $mdp = $_POST['mot_de_passe'] ?? '';

    if (empty($email) || empty($mdp)) {
        $erreur = 'Veuillez remplir tous les champs.';
    } else {
        // Préparation de la requête
        $stmt = $pdo->prepare('SELECT * FROM ADHERENT WHERE email = ?');
        $stmt->execute([$email]);
        $adherent = $stmt->fetch();

        // 3. RÉSOLUTION DU CONFLIT DE HACHAGE
        // On vérifie si l'utilisateur existe ET si le mot de passe correspond.
        // On teste le hachage (password_verify) OU le texte clair (===)
        $mot_de_passe_valide = false;
        
        if ($adherent) {
            if (password_verify($mdp, $adherent['mot_de_passe']) || $mdp === $adherent['mot_de_passe']) {
                $mot_de_passe_valide = true;
            }
        }

        if ($mot_de_passe_valide) {
            
            // Sécurisation de la session
            session_regenerate_id(true);

            // 4. TRANSMISSION DE L'IDENTITÉ
            // On sauvegarde le prénom et le nom pour les utiliser sur la page d'accueil
            $_SESSION['adherent_id'] = $adherent['id_adherent'];
            $_SESSION['prenom']      = $adherent['prenom'];
            $_SESSION['nom']         = $adherent['nom'];
            $_SESSION['est_admin']   = (bool) $adherent['est_admin'];

            // Redirection selon le rôle
            if ($adherent['est_admin']) {
                header('Location: admin/dashboard.php');
            } else {
                header('Location: ../../index.php');
            }
            exit; // Fin du script

        } else {
            $erreur = 'Email ou mot de passe incorrect.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FDF | Fou De Foot</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../Prestation/prestation.php">Prestations</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="../Login/login.php" class="btn btn-primary" style="margin-left: 1rem;">S'inscrire</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="form-card">
            <h2>Connexion</h2>

            <?php 
            // 5. AFFICHAGE DE L'ERREUR POUR L'UTILISATEUR
            // Si la connexion échoue, ce bloc rouge apparaîtra au-dessus du formulaire.
            if (!empty($erreur)): 
            ?>
                <div style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
                    <strong>Erreur :</strong> <?php echo $erreur; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Adresse Email *</label>
                    <input type="email" id="email" name="email" placeholder="votre@email.fr" required autofocus>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe *</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                    Se connecter
                </button>
            </form>

            <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 3px solid var(--gris-clair);">
                <p style="color: var(--gris-beton); font-weight: 500;">
                    Pas encore de compte ?<br>
                    <a href="../Login/login.php" style="color: var(--vert-terrain); font-weight: 700; text-decoration: none; font-size: 1.1rem; margin-top: 0.5rem; display: inline-block;">
                        Créer un compte gratuitement →
                    </a>
                </p>
            </div>

            <div style="margin-top: 2rem; padding: 1rem; background: rgba(255, 210, 63, 0.1); border: 2px solid var(--jaune-flash);">
                <p style="font-size: 0.85rem; color: var(--gris-beton); text-align: center;">
                    <strong>Comptes de test :</strong><br>
                    <span style="font-size: 0.75rem;">
                        Admin: admin@fdf.fr / admin123<br>
                        Adhérent: lucas@mail.fr / Test1234
                    </span>
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
                <p><a href="connexion.php">Connexion</a></p>
                <p><a href="../Login/login.php">Inscription</a></p>
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