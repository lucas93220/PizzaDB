<?php
include_once('db.php');
include_once('update_ingredients.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Ingrédients</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                    <a class="nav-link" href="#">Liste des Ingrédients <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_livreurs.php">Liste des Livreurs</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4">Liste des Ingrédients</h1>
        <div class="mt-4">
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#ajouterIngredientModal">Ajouter un ingrédient</a>
            <ul class="list-group">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . $row["NOMINGR"] . " - " . $row["UNITEINGR"] . " <a href='?action=edit&id=" . $row["CODEINGR"] . "' class='btn btn-warning btn-sm'>Modifier</a> <a href='?action=delete&id=" . $row["CODEINGR"] . "' class='btn btn-danger btn-sm'>Supprimer</a></li>";
                    }
                } else {
                    echo "<li class='list-group-item'>Aucun ingrédient trouvé.</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Modal Ajouter Ingrédient -->
    <div class="modal fade" id="ajouterIngredientModal" tabindex="-1" role="dialog" aria-labelledby="ajouterIngredientModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterIngredientModalLabel">Ajouter un ingrédient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="nom">Nom de l'ingrédient :</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="unite">Unité :</label>
                            <input type="text" class="form-control" id="unite" name="unite" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_ingredient">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
