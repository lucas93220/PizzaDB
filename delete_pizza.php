<?php

include_once ('db.php');

// Vérifier si l'ID de la pizza est passé en paramètre
if(isset($_GET["id"])) {
    // Récupérer l'ID de la pizza
    $id = $_GET["id"];



    // Supprimer la pizza de la base de données
    $sql = "DELETE FROM pizza WHERE NROPIZZ=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pizza supprimée avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
} else {
    echo "ID de la pizza non spécifié.";
}

// Rediriger vers la liste des pizzas
header("Location: index.php");
exit();
?>
