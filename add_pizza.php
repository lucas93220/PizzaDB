<?php
include_once ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Pizza</title>
</head>
<body>
    <h1>Ajouter une Pizza</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $design = $_POST["design"];
        $tarif = $_POST["tarif"];

      

        // Insérer une nouvelle pizza dans la base de données
        $sql = "INSERT INTO pizza (DESIGNPIZZ, TARIFPIZZ) VALUES ('$design', '$tarif')";
        if ($conn->query($sql) === TRUE) {
            echo "Pizza ajoutée avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        // Fermer la connexion
        $conn->close();
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="design">Désignation de la Pizza:</label>
        <input type="text" name="design" required><br>

        <label for="tarif">Tarif (en €):</label>
        <input type="text" name="tarif" required><br>

        <input type="submit" value="Ajouter">
    </form>

    <br>
    <a href="index.php">Retour à la liste des Pizzas</a>
</body>
</html>
