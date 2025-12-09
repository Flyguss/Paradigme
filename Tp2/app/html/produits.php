<?php
use MongoDB\Client;

require_once __DIR__ . "/../src/vendor/autoload.php";

$c = new Client("mongodb://mongo:27017");
$db = $c->local;

// Récupérer la catégorie depuis l'URL
$categorie = $_GET['categorie'] ?? '';

// Requête filtrée uniquement si une catégorie est définie

$produits = $db->produits->find(['categorie' => $categorie], ['projection' => ['_id' => 0, 'libelle' => 1]]);

foreach ($produits as $doc) {
    echo $doc['libelle'] . "<br>";
}
