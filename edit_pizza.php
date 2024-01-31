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
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Modifier une Pizza</h1>

    <?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $result = $conn->query("SELECT * FROM pizza WHERE NROPIZZ = $id");

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $design = $_POST["design"];
                $tarif = $_POST["tarif"];

                // Si un fichier a été téléchargé
                if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image_name = $_FILES['image']['name'];
                    $image_tmp_name = $_FILES['image']['tmp_name'];
                    $image_type = $_FILES['image']['type'];

                    // Déplacer le fichier téléchargé vers un emplacement temporaire sur le serveur
                    $upload_directory = 'uploads/';
                    $target_file = $upload_directory . basename($image_name);
                    if (move_uploaded_file($image_tmp_name, $target_file)) {
                        // Mettre à jour la base de données avec le chemin de l'image
                        $sql = "UPDATE pizza SET DESIGNPIZZ='$design', TARIFPIZZ='$tarif', IMAGEPIZZ='$target_file' WHERE NROPIZZ=$id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Pizza mise à jour avec succès.";
                            header("Location: index.php");
                            exit();
                        } else {
                            echo "Erreur : " . $sql . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Erreur lors de l'upload de l'image.";
                    }
                } else {
                    // Si aucun fichier n'a été téléchargé, mettre à jour uniquement les autres champs sans toucher à l'image
                    $sql = "UPDATE pizza SET DESIGNPIZZ='$design', TARIFPIZZ='$tarif' WHERE NROPIZZ=$id";

                    if ($conn->query($sql) === TRUE) {
                        echo "Pizza mise à jour avec succès.";
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "Erreur : " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        } else {
            echo "Aucune pizza trouvée avec cet ID.";
        }

        $conn->close();
    } else {
        echo "ID de la pizza non spécifié.";
    }
    ?>

    <form method="post" action="<?php echo isset($id) ? htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id) : htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="design">Désignation de la Pizza :</label>
            <input type="text" class="form-control" id="design" name="design" value="<?php echo $row["DESIGNPIZZ"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="tarif">Tarif (en €) :</label>
            <input type="text" class="form-control" id="tarif" name="tarif" value="<?php echo $row["TARIFPIZZ"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Image de la Pizza :</label>
            <?php if (isset($row['IMAGEPIZZ'])): ?>
                <img src="<?php echo $row['IMAGEPIZZ']; ?>" alt="Image de la Pizza" class="img">
            <?php endif; ?>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET["action"]) && $_GET["action"] == "add" ? "add_pizza" : (isset($_GET["action"]) && $_GET["action"] == "delete" ? "delete_pizza" : "edit_pizza"); ?>">
            <?php echo isset($_GET["action"]) && $_GET["action"] == "add" ? "Ajouter" : (isset($_GET["action"]) && $_GET["action"] == "delete" ? "Supprimer" : "Modifier"); ?>
        </button>
    </form>

    <br>
    <a href="index.php">Retour à la liste des Pizzas</a>
</div>
</body>
</html>
