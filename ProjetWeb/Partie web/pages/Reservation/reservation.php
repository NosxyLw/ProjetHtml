<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation Terrain</title>
</head>
<body>
    <h2>Réserver un terrain de foot</h2>
    
    <form action="traitement.php" method="POST">
        
        Nom du capitaine : <br>
        <input type="text" name="nom_client" required>
        <br><br>

        Date du match : <br>
        <input type="date" name="date_match" required>
        <br><br>
        
        Terrain : <br>
        <select name="terrain" required>
            <option value="">-- Choisissez un terrain --</option>
            <option value="terrain_a">Terrain A (Synthétique)</option>
            <option value="terrain_b">Terrain B (Pelouse naturelle)</option>
            <option value="terrain_c">Terrain C (Indoor / Five)</option>
            <option value="stade_honneur">Stade d'Honneur</option>
        </select>
        <br><br>

        Nombre de joueurs : <br>
        <input type="number" name="nb_joueurs" min="2" max="15" value="10">
        <br><br>

        <input type="submit" value="Valider la réservation">
        
    </form>
</body>
</html>