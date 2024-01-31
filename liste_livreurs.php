<?php
include('db.php');

$query = "SELECT * FROM livreur";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livreurs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pizzeria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Liste des pizzas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_commandes.php">Liste des Commandes</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Liste des Livreurs <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_ingredients.php">Liste des Ingrédients</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4">Liste des Livreurs</h1>
        <div class="mt-4">
            <ul class="list-group">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'>Livreur #" . $row["NROLIVR"] . " - " . $row["NOMLIVR"] . " " . $row["PRENOMLIVR"] . "</li>";
                    }
                } else {
                    echo "<li class='list-group-item'>Aucun livreur trouvé.</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
