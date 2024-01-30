<?php
include_once ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Pizza</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h1 class="mt-4">Modifier une Pizza</h1>

    <?php
    // Vérifier si l'ID de la pizza est passé en paramètre
    if(isset($_GET["id"])) {
        // Récupérer l'ID de la pizza
        $id = $_GET["id"];

 

        // Récupérer les détails de la pizza à partir de la base de données
        $result = $conn->query("SELECT * FROM pizza WHERE NROPIZZ = $id");

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Si le formulaire est soumis, mettre à jour les données de la pizza
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $design = $_POST["design"];
                $tarif = $_POST["tarif"];

                $sql = "UPDATE pizza SET DESIGNPIZZ='$design', TARIFPIZZ='$tarif' WHERE NROPIZZ=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "Pizza mise à jour avec succès.";
                } else {
                    echo "Erreur : " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            echo "Aucune pizza trouvée avec cet ID.";
        }

        // Fermer la connexion
        $conn->close();
    } else {
        echo "ID de la pizza non spécifié.";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
        <label for="design">Désignation de la Pizza:</label>
        <input type="text" name="design" value="<?php echo $row["DESIGNPIZZ"]; ?>" required><br>

        <label for="tarif">Tarif (en €):</label>
        <input type="text" name="tarif" value="<?php echo $row["TARIFPIZZ"]; ?>" required><br>

        <input type="submit" value="Modifier">
    </form>

    <br>
    <a href="index.php">Retour à la liste des Pizzas</a>
    </div>
</body>
</html>
