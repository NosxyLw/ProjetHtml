<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription Matrix</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);

        echo "<div class='succes'>";
        echo "BIENVENUE CHEZ NOUS : $prenom $nom ($email)";
        echo "<br><a href='inscription.php' class='retour'>[ RETOUR ]</a>";
        echo "</div>";
    }
    ?>

    <h2 class="titre">Inscription</h2>
    
    <form action="" method="POST">
        <div class="ligne">
            <label>EMAIL :</label>
            <input type="email" name="email" class="champ" required>
        </div>

        <div class="ligne">
            <label>MOT DE PASSE :</label>
            <input type="password" name="password" class="champ" required>
        </div>

        <div class="ligne">
            <label>NOM :</label>
            <input type="text" name="nom" class="champ" required>
        </div>

        <div class="ligne">
            <label>PRENOM :</label>
            <input type="text" name="prenom" class="champ" required>
        </div>

        <div class="genre-box">
            <label>GENRE :</label>
            <input type="radio" name="genre" value="H" required> Homme
            <input type="radio" name="genre" value="F"> Femme
            <input type="radio" name="genre" value="A"> Autre
        </div>

        <input type="submit" class="btn" value="VALIDER L'INSCRIPTION">
    </form>
</div>

</body>
</html>