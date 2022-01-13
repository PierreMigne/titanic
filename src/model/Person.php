<?php

namespace App\model;

class Person
{
    public function __construct(
        private string $passengerId = "",
        private string $survived = "",
        private string $pclass = "",
        private string $name = "",
        private string $sex = "",
        private string $age = "",
        private string $sibSp = "",
        private string $parch = "",
        private string $ticket = "",
        private string $fare = "",
        private string $cabin = "",
        private string $embarked = ""
    ) {
    }

    public function getSurvived()
    {
        return $this->survived;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function getPclass()
    {
        return $this->pclass;
    }
}
