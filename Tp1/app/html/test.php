<?php
require __DIR__ . '/../vendor/autoload.php';
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use praticiens\entitees\Praticien;
use praticiens\entitees\Specialite;
use praticiens\entitees\Structure;


$mapping_path = __DIR__ . '/../infra/mapping/';
$isDevMode=true;
$dbParams = parse_ini_file(__DIR__ . '/../config/ticket.ini');

$config = ORMSetup::
createXMLMetadataConfiguration([$mapping_path], $isDevMode);
$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);

$specialityRepository = $entityManager->getRepository(Specialite::class);

echo "<h1>Exercice 1</h1><h2>Question 1 ./ </h2>" ;

$s = $specialityRepository->find(1) ;

echo $s->getLibelle() ;

echo "<h2>Question 2 ./ </h2>" ;

$praticiensRepository = $entityManager->getRepository(Praticien::class);

$p = $praticiensRepository->find("8ae1400f-d46d-3b50-b356-269f776be532") ;

echo $p->getId() . " / " . $p->getNom() . " / " . $p->getPrenom() . " / " . $p->getVille() . " / " . $p->getEmail() . " / " . $p->getTelephone() ;

echo "<h2>Question 3 ./ </h2>" ;

echo  "Specialité : " . $p->getSpecialite()->getLibelle() . " et structure : " . $p->getStructure()->getNom() ;

echo "<h2>Question 4 ./ </h2>" ;

$structureRepository = $entityManager->getRepository(Structure::class);

$st = $structureRepository->find("3444bdd2-8783-3aed-9a5e-4d298d2a2d7c") ;

echo $st->getId() . " / " . $st->getNom() . " / " . $st->getAdresse() . " / " . $st->getVille() . " / " . $st->getCodePostal() . " / " . $st->getTelephone() ."<br> Praticiens affiliés a cette structure : <br><br>" ;

foreach ($st->getPraticiens() as $p) {
    echo  $p->getNom() . " / " . $p->getPrenom() . " / " . $p->getVille() . " / " . $p->getEmail() . " / " . $p->getTelephone() ."<br>";
}

$spmv = $specialityRepository->find(1);

echo "<h2>Question 5 ./ </h2>" ;

echo "Motifs de visite pour la spécialité " . $spmv->getLibelle() . " : <br><br>" ;

foreach ($spmv->getMotifsVisite() as $mv) {
    echo  $mv->getLibelle() . "<br>";
}