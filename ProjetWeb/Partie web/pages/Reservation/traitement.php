<?php
require_once '../../Partie web/database.php'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom_client']);
    $date = htmlspecialchars($_POST['date_match']);
    $joueurs = htmlspecialchars($_POST['nb_joueurs']);
    $terrain = htmlspecialchars($_POST['terrain']);

    echo "<h1>Récapitulatif de la réservation</h1>";
    echo "Merci <b>" . $nom . "</b> !<br>";
    echo "Le terrain est réservé pour le : " . $date . "<br>";
    echo "Terrain prévu : " . $terrain . "<br>";
    echo "Nombre de participants prévus : " . $joueurs . " joueurs.<br>";
    echo "<br><a href='reservation.php'>Retour au formulaire</a>";
} else {
    echo "Veuillez passer par le formulaire de réservation.";
}
?>
