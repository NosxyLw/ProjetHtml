<?php
// 1. Démarrage de la session et connexion à la base
session_start();
require_once '../../database.php';

$message_erreur = "";

// 2. Si l'utilisateur a cliqué sur le bouton "Finaliser mon inscription"
if (isset($_POST['bouton_inscription'])) {
    
    // Récupération simple des données du formulaire
    $nom       = $_POST['nom'];
    $prenom    = $_POST['prenom'];
    $genre     = $_POST['genre'];
    $adresse   = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];

    // 3. VÉRIFICATION : L'email existe-t-il déjà dans la base ?
    $verification = $pdo->prepare("SELECT email FROM COMPTE WHERE email = ?");
    $verification->execute([$email]);

    if ($verification->rowCount() > 0) {
        // Si rowCount est plus grand que 0, ça veut dire qu'on a trouvé l'email
        $message_erreur = "Cette adresse email est déjà enregistrée.";
    } else {
        // 4. ÉTAPE A : Création du compte (Table COMPTE)
        // On utilise des "?" à la place des variables pour se protéger des piratages (Injection SQL)
        $requete1 = $pdo->prepare("INSERT INTO COMPTE (email, mot_de_passe, est_admin) VALUES (?, ?, 0)");
        $requete1->execute([$email, $password]);

        // 5. ÉTAPE B : Création du profil (Table ADHERENT)
        $requete2 = $pdo->prepare("INSERT INTO ADHERENT (nom, prenom, genre, adresse, telephone, email) VALUES (?, ?, ?, ?, ?, ?)");
        $requete2->execute([$nom, $prenom, $genre, $adresse, $telephone, $email]);

        // 6. Succès : Redirection vers la page de connexion
        header("Location: ../Connexion/connexion.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - FDF</title>
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
            </ul>
        </div>
    </nav>

    <div class="container" style="padding-top: 3rem; max-width: 600px; margin: auto;">
        
        <?php if ($message_erreur != "") { ?>
            <div style="color: red; background-color: #f8d7da; padding: 15px; margin-bottom: 20px; border: 1px solid red;">
                <strong>Erreur :</strong> <?php echo $message_erreur; ?>
            </div>
        <?php } ?>

        <h2 style="text-align: center;">Rejoindre Fou De Foot</h2>

        <form action="" method="POST">
            
            <label>Nom *</label>
            <input type="text" name="nom" required style="width: 100%; margin-bottom: 10px;">
            
            <label>Prénom *</label>
            <input type="text" name="prenom" required style="width: 100%; margin-bottom: 10px;">
            
            <label>Genre *</label><br>
            <input type="radio" name="genre" value="H" required> Homme
            <input type="radio" name="genre" value="F"> Femme
            <input type="radio" name="genre" value="A"> Autre
            <br><br>
            
            <label>Adresse postale *</label>
            <input type="text" name="adresse" required style="width: 100%; margin-bottom: 10px;">
            
            <label>Téléphone *</label>
            <input type="text" name="telephone" required style="width: 100%; margin-bottom: 10px;">
            
            <label>Email (Sert d'identifiant) *</label>
            <input type="email" name="email" required style="width: 100%; margin-bottom: 10px;">
            
            <label>Mot de passe *</label>
            <input type="password" name="password" required style="width: 100%; margin-bottom: 20px;">
            
            <button type="submit" name="bouton_inscription" class="btn btn-primary" style="width: 100%; padding: 10px;">
                Finaliser mon inscription
            </button>
            
        </form>
    </div>
</body>
</html>