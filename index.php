<?php
include_once ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pizzas</title>
</head>
<body>
    <h1>Liste des Pizzas</h1>

    <?php
  

    // Récupérer les pizzas depuis la base de données
    $result = $conn->query("SELECT * FROM pizza");

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["DESIGNPIZZ"] . " - " . $row["TARIFPIZZ"] . " € - <a href='edit_pizza.php?id=" . $row["NROPIZZ"] . "'>Modifier</a> - <a href='delete_pizza.php?id=" . $row["NROPIZZ"] . "'>Supprimer</a></li>";
        }
        echo "</ul>";
    } else {
        echo "Aucune pizza trouvée.";
    }

    // Fermer la connexion
    $conn->close();
    ?>

    <a href="add_pizza.php">Ajouter une Pizza</a>
</body>
</html>
