<?php
use MongoDB\Client;

require_once __DIR__ . "/../src/vendor/autoload.php";

$c = new Client("mongodb://mongo:27017");

// Sélection de la collection "produits" dans la base par défaut
$db = $c->local;

// Récupération de tous les documents
$produits = $db->produits->find([] , ['projection' => ["_id" => 0 , "numero" => 1 , "categorie" => 1 , "libelle" => 1]]);

foreach ($produits as $doc) {
    $string = $doc['numero'] . " / " . $doc['categorie'] . " / " . $doc['libelle'] ;
    echo "$string <br>";
}

echo "<h1>Question 5</h1>" ;


$produits = $db->produits->find(["numero" => 6] , ['projection' => ["_id" => 0 ]]);

foreach ($produits as $doc) {
    $string = $doc['numero'] . " / " . $doc['categorie'] . " / " . $doc['libelle'] . $doc['description'] . " / Tarif : " ;
    foreach ($doc['tarifs'] as $t) {
            $string .= $t['taille'] . " => " . $t['tarif'] . " ; " ;

    }
    echo "$string <br>";

    $i = 1 ;
    foreach ($doc['recettes'] as $recetteID) {
        $recettes = $db->recettes->find(["_id" => $recetteID] , ['projection' => ["_id" => 0 , "nom" => 1 , "difficulte" => 1 ]]);

        echo "<p>Recette $i : </p>" ;
        foreach ($recettes as $recette) {
            $string = $recette['nom'] . " / " . $recette['difficulte']  ;
            echo "$string <br>";
        }
        $i += 1 ;
    }

}

echo "<h1>Question 6</h1>" ;

function produit($numero , $taille)
{
    $c = new Client("mongodb://mongo:27017");
    $db = $c->local;
    $produits = $db->produits->find(["numero" => $numero], ['projection' => ["_id" => 0, "numero" => 1, "categorie" => 1, "libelle" => 1, "tarifs" => 1]]);
    $tableau = [];
    foreach ($produits as $doc) {
        $tableau = [$doc['numero'], $doc['libelle'], $doc['categorie']];
        foreach ($doc['tarifs'] as $t) {
            if ($t["taille"] == $taille) {
                array_push($tableau, $t["taille"], $t["tarif"]);
            }
        }

    }
    return $tableau;
}

echo "Voir fonction dans le code !" ;





