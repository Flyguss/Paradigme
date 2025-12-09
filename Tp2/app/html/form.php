<?php
use MongoDB\Client;

require_once __DIR__ . "/../src/vendor/autoload.php";

// Connexion à MongoDB
$c = new Client("mongodb://mongo:27017");
$db = $c->local;


// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $numero = $_POST['numero'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $libelle = $_POST['libelle'] ?? '';

    // Validation simple
    if ($numero && $categorie && $libelle) {
        $produit = $db->produits->insertOne([
            'numero' => $numero,
            'categorie' => $categorie,
            'libelle' => $libelle
        ]);

       $ird = $produit->getInsertedId() ;

        $message = "Le Produit  $ird ajouté avec succès !";
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>

    <?php if (!empty($message)) echo "<p>$message</p>"; ?>

    <form action="" method="post">
        <label>Numéro : <input type="text" name="numero" required></label><br><br>
        <label>Catégorie : <input type="text" name="categorie" required></label><br><br>
        <label>Libellé : <input type="text" name="libelle" required></label><br><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>