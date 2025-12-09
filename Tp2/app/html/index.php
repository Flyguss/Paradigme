<?php
use MongoDB\Client;

require_once __DIR__ . "/../src/vendor/autoload.php";

$c = new Client("mongodb://mongo:27017");

// Sélection de la collection "produits" dans la base par défaut
$db = $c->local;

// Récupération de tous les documents
$produits = $db->produits->find([] , ['projection' => ["_id" => 0 , "numero" => 1 , "categorie" => 1 , "libelle" => 1]]);

foreach ($produits as $doc) {
    $json = json_encode($doc, JSON_PRETTY_PRINT);
    echo "$json <br>";
}



