<?php
require_once '../../database.php';
session_start();

$erreur = '';

if (isset($_POST['bouton_connexion'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mot_de_passe'];

    if ($email == '' || $mdp == '') {
        $erreur = 'Veuillez remplir tous les champs.';
    } else {
        $requeteCompte = $pdo->prepare('SELECT * FROM COMPTE WHERE email = ?');
        $requeteCompte->execute([$email]);
        $compte = $requeteCompte->fetch();

        if ($compte && $compte['mot_de_passe'] == $mdp) {
            $requeteAdherent = $pdo->prepare('SELECT * FROM ADHERENT WHERE email = ?');
            $requeteAdherent->execute([$email]);
            $adherent = $requeteAdherent->fetch();

            $_SESSION['email'] = $compte['email'];
            $_SESSION['est_admin'] = $compte['est_admin'];

            if ($adherent) {
                $_SESSION['adherent_id'] = $adherent['id_adherent'];
                $_SESSION['prenom'] = $adherent['prenom'];
                $_SESSION['nom'] = $adherent['nom'];
            } else {
                $_SESSION['prenom'] = 'Responsable';
            }

            if ($_SESSION['est_admin'] == 1) {
                header('Location: ../Admin/dashboard.php');
            } else {
                header('Location: ../Membre/dashboard.php');
            }
            exit();
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