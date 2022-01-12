<?php

namespace App\model;

class Person
{


    public function __construct(
        public string $passengerId,
        public string $survived,
        public string $pclass,
        public string $name,
        public string $sex,
        public string $age,
        public string $sibSp,
        public string $parch,
        public string $ticket,
        public string $fare,
        public string $cabin,
        public string $embarked
    ) {
    }
}
