<?php

use MongoDB\Client;

require_once __DIR__ . "/../src/vendor/autoload.php";

$c = new Client("mongodb://mongo:27017");

// Sélection de la collection "produits" dans la base par défaut
$db = $c->local;


$produits = $db->produits->find([] , ['projection' => ["_id" => 0 , "numero" => 1 , "categorie" => 1 , "libelle" => 1]]);

$categories = [];

foreach ($produits as $doc) {
    $categories[] = $doc['categorie'];
}

$categories = array_unique($categories);

foreach ($categories as $c) {
    echo "<a href='produits.php?categorie=$c'>$c</a><br>";
}

echo "<br><a href='form.php'>Ajouter un produit</a><br>";