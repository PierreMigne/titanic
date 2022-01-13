<?php

use App\AllPeoples;
use App\observer\ChanceBySex;
use App\ReadIterator;
use App\SurvivedPeoples;

require_once './vendor/autoload.php';

$allPeoples = new AllPeoples(new ReadIterator(__DIR__ . '/Data/titanic.csv'));

$allPeoples->findAll();
$nbOfPeoples = count($allPeoples->findAll());
$nbOfSurvivedPeoples = $allPeoples->findAllSurvivors();

$proportionOfSurvivedPeoples = round($nbOfSurvivedPeoples / $nbOfPeoples * 100, 2);


print('La proportion de personnes qui ont survécu dans le Titanic est de ' . $proportionOfSurvivedPeoples . '%' . PHP_EOL);
// $allPeoples->attach(new ChanceBySex);

$nbOfMaleWhoSurvived = $allPeoples->findAllSurvivorsBySex('male');
$nbOfFemaleWhoSurvived = $allPeoples->findAllSurvivorsBySex('female');

$proportionOfMaleWhoSurvived = round($nbOfMaleWhoSurvived / $nbOfPeoples * 100, 2);
$proportionOfFemaleWhoSurvived = round($nbOfFemaleWhoSurvived / $nbOfPeoples * 100, 2);


print("La proportion d'hommes qui ont survécu dans le Titanic est de " . $proportionOfMaleWhoSurvived . '%' . PHP_EOL);
print("La proportion de femmes qui ont survécu dans le Titanic est de " . $proportionOfFemaleWhoSurvived . '%' . PHP_EOL);


$proportionOfMaleWhoSurvivedInClass1 = round($allPeoples->findAllSurvivorsBySexAndClass('male', '1') / $nbOfPeoples * 100, 2);
print("La proportion d'hommes de la classe 1 qui ont survécu dans le Titanic est de " . $proportionOfMaleWhoSurvivedInClass1 . '%' . PHP_EOL);

$proportionOfMaleWhoSurvivedInClass2 = round($allPeoples->findAllSurvivorsBySexAndClass('male', '2') / $nbOfPeoples * 100, 2);
print("La proportion d'hommes de la classe 2 qui ont survécu dans le Titanic est de " . $proportionOfMaleWhoSurvivedInClass2 . '%' . PHP_EOL);

$proportionOfMaleWhoSurvivedInClass3 = round($allPeoples->findAllSurvivorsBySexAndClass('male', '3') / $nbOfPeoples * 100, 2);
print("La proportion d'hommes de la classe 3 qui ont survécu dans le Titanic est de " . $proportionOfMaleWhoSurvivedInClass3 . '%' . PHP_EOL);


$proportionOfFemaleWhoSurvivedInClass1 = round($allPeoples->findAllSurvivorsBySexAndClass('female', '1') / $nbOfPeoples * 100, 2);
print("La proportion de femmes de la classe 1 qui ont survécu dans le Titanic est de " . $proportionOfFemaleWhoSurvivedInClass1 . '%' . PHP_EOL);

$proportionOfFemaleWhoSurvivedInClass2 = round($allPeoples->findAllSurvivorsBySexAndClass('female', '2') / $nbOfPeoples * 100, 2);
print("La proportion de femmes de la classe 2 qui ont survécu dans le Titanic est de " . $proportionOfFemaleWhoSurvivedInClass2 . '%' . PHP_EOL);

$proportionOfFemaleWhoSurvivedInClass3 = round($allPeoples->findAllSurvivorsBySexAndClass('female', '3') / $nbOfPeoples * 100, 2);
print("La proportion de femmes de la classe 3 qui ont survécu dans le Titanic est de " . $proportionOfFemaleWhoSurvivedInClass3 . '%' . PHP_EOL);
