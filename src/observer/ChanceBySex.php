<?php

namespace App\observer;

use App\AllPeoples;
use SplObserver;
use SplSubject;

class ChanceBySex implements SplObserver
{

    public function __construct(private AllPeoples $allPeoples)
    {
    }

    public function update(SplSubject $subject): void
    {
        $nbOfPeople = count($this->allPeoples->findAll());
        if ($subject->sex == 'male') {
            $maleSurvived = $this->allPeoples->findAllSurvivorsBySex('male');
            echo ('Un homme a ' . round(($maleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
        } else {
            $femaleSurvived = $this->allPeoples->findAllSurvivorsBySex('female');
            echo ('Une femme a ' . round(($femaleSurvived / $nbOfPeople) * 100, 2) . '% de chance de survivre sur le titanic' . PHP_EOL);
        }
    }
}
