<?php
require __DIR__ . '/../vendor/autoload.php';
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use praticiens\entitees\Praticien;
use praticiens\entitees\Specialite;


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

echo $p->getSpecialite()->getLibelle() ;