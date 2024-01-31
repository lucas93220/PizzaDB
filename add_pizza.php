<?php
include_once('db.php');

$design = $tarif = '';
$image = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $design = htmlspecialchars($_POST["design"]);
    $tarif = htmlspecialchars($_POST["tarif"]);

    // Validation des champs
    if (empty($design) || empty($tarif)) {
        echo "Les champs désignation et tarif sont obligatoires.";
    } else {
        // Upload de l'image
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_type = $_FILES['image']['type'];

            // Déplacement du fichier téléchargé vers un emplacement temporaire sur le serveur
            $upload_directory = 'uploads/';
            $target_file = $upload_directory . basename($image_name);
            if (move_uploaded_file($image_tmp_name, $target_file)) {
                $image = $target_file;
            } else {
                echo "Erreur lors de l'upload de l'image.";
            }
        }

        // Insertion des données dans la base de données
        $sql = "INSERT INTO pizza (DESIGNPIZZ, TARIFPIZZ, IMAGEPIZZ) VALUES ('$design', '$tarif', '$image')";
        if ($conn->query($sql) === TRUE) {
            echo "Pizza ajoutée avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Pizza</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Ajouter une Pizza</h1>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="design">Désignation de la Pizza:</label>
                <input type="text" class="form-control" id="design" name="design" value="<?php echo $design; ?>" required>
            </div>
            <div class="form-group">
                <label for="tarif">Tarif (en €):</label>
                <input type="text" class="form-control" id="tarif" name="tarif" value="<?php echo $tarif; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image de la Pizza:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <br>
        <a href="index.php">Retour à la liste des Pizzas</a>
    </div>
</body>

</html>
