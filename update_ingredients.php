<?php
// Supprimer un ingrédient
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM ingredient WHERE CODEINGR = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: liste_ingredients.php");
    exit();
}

// Modifier ou ajouter un ingrédient
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_ingredient'])) {
        $nom = $_POST['nom'];
        $unite = $_POST['unite'];
        $insert_query = "INSERT INTO ingredient (NOMINGR, UNITEINGR) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ss", $nom, $unite);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['edit_ingredient'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $unite = $_POST['unite'];
        $update_query = "UPDATE ingredient SET NOMINGR = ?, UNITEINGR = ? WHERE CODEINGR = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("sss", $nom, $unite, $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Récupérer la liste des ingrédients depuis la base de données
$query = "SELECT * FROM ingredient";
$result = $conn->query($query);
?>