<?php

namespace App;

use Ds\Map;

class SurvivedPeoples extends AllPeoples
{

    public function __construct(private $allPeoples)
    {
    }

    public function findAllSurvivors()
    {

        foreach ($this->allPeoples as [$i, $j]) {
            print_r($this->allPeoples->get((int) $i));
        }
    }
}
