<?php
// 1. Appel de la base de données et démarrage de la session
require_once '../../database.php';
session_start();

$erreur = ''; 

// 2. Si l'utilisateur a cliqué sur le bouton de connexion
if (isset($_POST['bouton_connexion'])) {

    $email = $_POST['email'];
    $mdp = $_POST['mot_de_passe'];

    // Vérification que les champs ne sont pas vides
    if ($email == '' || $mdp == '') {
        $erreur = 'Veuillez remplir tous les champs.';
    } else {
        
        // 3. ÉTAPE 1 : On cherche l'email dans la table COMPTE
        $requeteCompte = $pdo->prepare('SELECT * FROM COMPTE WHERE email = ?');
        $requeteCompte->execute([$email]);
        $compte = $requeteCompte->fetch();

        // 4. ÉTAPE 2 : Vérification "simple" du mot de passe (sans hachage complexe)
        if ($compte && $compte['mot_de_passe'] == $mdp) {
            
            // 5. ÉTAPE 3 : Si le compte existe, on va chercher son profil dans ADHERENT
            $requeteAdherent = $pdo->prepare('SELECT * FROM ADHERENT WHERE email = ?');
            $requeteAdherent->execute([$email]);
            $adherent = $requeteAdherent->fetch();

            // 6. On sauvegarde les informations dans la Session
            $_SESSION['email'] = $compte['email'];
            $_SESSION['est_admin'] = $compte['est_admin'];
            
            // Si on a trouvé un profil adhérent, on sauvegarde son prénom et son ID
            if ($adherent) {
                $_SESSION['adherent_id'] = $adherent['id_adherent'];
                $_SESSION['prenom'] = $adherent['prenom'];
                $_SESSION['nom'] = $adherent['nom'];
            } else {
                // S'il n'a pas de profil (ex: c'est juste l'Admin), on met un prénom par défaut
                $_SESSION['prenom'] = 'Responsable';
            }

            // 7. ROUTAGE : Redirection selon le rôle (Admin = 1, Membre = 0)
            if ($_SESSION['est_admin'] == 1) {
                header('Location: ../Admin/dashboard.php');
            } else {
                header('Location: ../Membre/dashboard.php');
            }
            exit();

        } else {
            // Si l'email n'existe pas ou si le mot de passe est faux
            $erreur = 'Email ou mot de passe incorrect.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - FDF</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../Prestation/prestation.php">Prestations</a></li>
                <li><a href="../Login/login.php" class="btn btn-primary">S'inscrire</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="padding-top: 3rem; max-width: 500px; margin: auto;">
        
        <h2 style="text-align: center;">Connexion</h2>

        <?php if ($erreur != '') { ?>
            <div style="color: red; background-color: #f8d7da; padding: 10px; margin-bottom: 15px; border: 1px solid red; text-align: center;">
                <strong>Erreur :</strong> <?php echo $erreur; ?>
            </div>
        <?php } ?>

        <form action="" method="post">
            <label>Adresse Email *</label>
            <input type="email" name="email" required style="width: 100%; margin-bottom: 15px;">
            
            <label>Mot de passe *</label>
            <input type="password" name="mot_de_passe" required style="width: 100%; margin-bottom: 20px;">
            
            <button type="submit" name="bouton_connexion" class="btn btn-primary" style="width: 100%; padding: 10px;">
                Se connecter
            </button>
        </form>

        <div style="text-align: center; margin-top: 2rem;">
            <p>Pas encore de compte ? <a href="../Login/login.php" style="color: green; font-weight: bold;">S'inscrire ici</a></p>
        </div>
        
        <div style="margin-top: 2rem; padding: 1rem; background: #fff3cd; border: 1px solid #ffeeba; text-align: center;">
            <p style="font-size: 0.85rem;">
                <strong>Comptes de test :</strong><br>
                Admin: admin@fdf.fr / admin123<br>
                Membre: lucas@mail.fr / Test1234
            </p>
        </div>
    </div>
</body>
</html>