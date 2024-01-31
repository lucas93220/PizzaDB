<?php

include_once ('db.php');

if(isset($_GET["id"])) {
    $id = $_GET["id"];



    $sql = "DELETE FROM pizza WHERE NROPIZZ=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pizza supprimée avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "ID de la pizza non spécifié.";
}

header("Location: index.php");
exit();
?>
