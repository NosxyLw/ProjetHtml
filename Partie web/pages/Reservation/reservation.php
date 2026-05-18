<?php
// 1. Démarrage de la session et connexion BDD
session_start();
require_once '../../database.php';

// Si l'utilisateur n'est pas connecté, on le met dehors
if (!isset($_SESSION['adherent_id'])) {
    header('Location: ../Connexion/connexion.php');
    exit();
}

$id_adherent = $_SESSION['adherent_id'];
$message = "";

// 2. Traitement du formulaire de réservation
if (isset($_POST['bouton_reserver'])) {
    
    $id_seance = $_POST['id_seance'];

    // ÉTAPE A : On vérifie si le membre a déjà réservé cette séance précise
    $verification = $pdo->prepare("SELECT * FROM RESERVATION WHERE id_adherent = ? AND id_seance = ?");
    $verification->execute([$id_adherent, $id_seance]);

    // Si rowCount est supérieur à 0, ça veut dire qu'on a trouvé une ligne
    if ($verification->rowCount() > 0) {
        $message = "Erreur : Vous avez déjà réservé cette séance.";
    } else {
        // ÉTAPE B : Si on n'a rien trouvé, on fait l'insertion (la réservation)
        $insertion = $pdo->prepare("INSERT INTO RESERVATION (id_adherent, id_seance) VALUES (?, ?)");
        $insertion->execute([$id_adherent, $id_seance]);
        
        $message = "Succès : Votre réservation est confirmée !";
    }
}

// 3. Récupération des séances pour construire le menu déroulant
// On fait une jointure pour récupérer le nom de la prestation (description) et le prix
$sql = "SELECT * FROM SEANCE 
        INNER JOIN PRESTATION ON SEANCE.code_prestation = PRESTATION.code_prestation 
        ORDER BY SEANCE.date_seance ASC";

$requeteSeances = $pdo->query($sql);
$seances = $requeteSeances->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation - FDF</title>
    <link rel="stylesheet" href="../../styles/fdf-modern.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="../../index.php" class="nav-logo">FOU DE FOOT</a>
            <ul class="nav-links">
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../Prestation/prestation.php">Prestations</a></li>
                <li><a href="../Membre/dashboard.php">Mon Espace</a></li>
                <li><a href="../Connexion/deconnexion.php" style="color: red;">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="padding-top: 3rem; max-width: 600px; margin: auto;">
        
        <h2 style="text-align: center;">Réserver une séance</h2>

        <?php if ($message != "") { ?>
            <div style="padding: 15px; margin-bottom: 20px; text-align: center; border: 1px solid #333; background-color: #f9f9f9; font-weight: bold;">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <form action="" method="POST">
            
            <label>Choisissez votre séance dans la liste :</label>
            <select name="id_seance" required style="width: 100%; padding: 10px; margin-top: 10px; margin-bottom: 20px;">
                <option value="">-- Sélectionnez une date --</option>
                
                <?php foreach ($seances as $s) { ?>
                    <option value="<?php echo $s['id_seance']; ?>">
                        Le <?php echo $s['date_seance']; ?> 
                        de <?php echo $s['heure_debut']; ?> à <?php echo $s['heure_fin']; ?> 
                        - <?php echo $s['description']; ?> 
                        (<?php echo $s['prix']; ?> €)
                    </option>
                <?php } ?>
                
            </select>

            <button type="submit" name="bouton_reserver" class="btn btn-primary" style="width: 100%; padding: 10px;">
                Confirmer ma réservation
            </button>
            
        </form>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="../Prestation/prestation.php">Retour au catalogue</a>
        </div>
    </div>
</body>
</html>