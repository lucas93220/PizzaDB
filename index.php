<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pizzas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pizzeria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Liste des pizzas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_commandes.php">Liste des Commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_ingredients.php">Liste des Ingrédients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_livreurs.php">Liste des Livreurs</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4">Liste des Pizzas</h1>

        <div class="row">
            <?php
            include('db.php');

            $result = $conn->query("SELECT * FROM pizza");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card h-100">';
                    if (isset($row['IMAGEPIZZ'])) {
                        echo '<img src="' . $row['IMAGEPIZZ'] . '" class="img" alt="Image de la Pizza">';
                    }
                    echo '<div class="card-body2">';
                    echo '<h5 class="card-title">' . $row['DESIGNPIZZ'] . '</h5>';
                    echo '<p class="card-text">Tarif : ' . $row['TARIFPIZZ'] . ' €</p>';
                    echo '<a href="edit_pizza.php?id=' . $row['NROPIZZ'] . '" class="btn btn-primary btn-sm m-1 btn-margin">Modifier</a>';
                    echo '<a href="delete_pizza.php?id=' . $row['NROPIZZ'] . '" class="btn btn-danger btn-sm m-1 btn-margin">Supprimer</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-md-12">';
                echo "<p>Aucune pizza trouvée.</p>";
                echo '</div>';
            }

            $conn->close();
            ?>
        </div>
        <a href="add_pizza.php" class="btn btn-success mt-4">Ajouter une Pizza</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</body>
</html>