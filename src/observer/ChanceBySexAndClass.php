<?php

namespace App\observer;

use App\AllPeoples;
use Exception;
use SplObserver;
use SplSubject;

class ChanceBySexAndClass implements SplObserver
{
    public function __construct(private AllPeoples $allPeoples)
    {
    }

    public function update(SplSubject $subject): void
    {
        $nbOfPeople = count($this->allPeoples->findAll());
        if ($subject->sex == 'male') {
            switch ($subject->classe) {
                case '1':
                    $maleSurvived = $this->allPeoples->findAllSurvivorsBySexAndClass('male', '1');
                    echo ('Un homme de classe 1 a ' . round(($maleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
                    break;
                case '2':
                    $maleSurvived = $this->allPeoples->findAllSurvivorsBySexAndClass('male', '2');
                    echo ('Un homme de classe 2 a ' . round(($maleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
                    break;
                case '3':
                    $maleSurvived = $this->allPeoples->findAllSurvivorsBySexAndClass('male', '3');
                    echo ('Un homme de classe 3 a ' . round(($maleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
                    break;

                default:
                    throw new Exception("Class must be '1' or '2' or '3' but is '$subject->classe'", 2);
                    break;
            }
        } else if ($subject->sex == 'female') {
            switch ($subject->classe) {
                case '1':
                    $femaleSurvived = $this->allPeoples->findAllSurvivorsBySexAndClass('female', '1');
                    echo ('Une femme de classe 1 a ' . round(($femaleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
                    break;
                case '2':
                    $femaleSurvived = $this->allPeoples->findAllSurvivorsBySexAndClass('female', '2');
                    echo ('Une femme de classe 2 a ' . round(($femaleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
                    break;
                case '3':
                    $femaleSurvived = $this->allPeoples->findAllSurvivorsBySexAndClass('female', '3');
                    echo ('Une femme de classe 3 a ' . round(($femaleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
                    break;

                default:
                    throw new Exception("Class must be '1' or '2' or '3' but is '$subject->classe'", 2);
                    break;
            }
        } else {
            throw new Exception("Sex must be 'male' or 'female' but is '$subject->sex'", 1);
        }
    }
}
