<?php

namespace App;

use App\model\Person;
use Ds\Map;
use Exception;

class AllPeoples
{

    private $storage;

    public function __construct(private $peoples)
    {
        $this->storage = new Map();
    }

    public function findAll()
    {
        foreach ($this->peoples as [$id, $survived, $pclass, $name, $sex, $age, $sibSp, $parch, $ticket, $fare, $cabin, $embarked]) {
            $person = new Person(passengerId: $id, survived: $survived, pclass: $pclass, name: $name, sex: $sex, age: $age, sibSp: $sibSp, parch: $parch, ticket: $ticket, fare: $fare, cabin: $cabin, embarked: $embarked);
            $this->storage->put((int) $id, $person);
        }
        return $this->storage;
    }

    public function findAllSurvivors(): int
    {
        $survivors = $this->storage->filter(function ($key, Person $value) {
            return $value->survived == "1";
        });
        return count($survivors);
    }


    /***
     * @param string $sex  must be 'male' or 'female'
     */
    public function findAllSurvivorsBySex(string $sex): int
    {
        switch ($sex) {
            case 'male':
                $maleSurvivors = $this->storage->filter(function ($key, Person $value) {
                    return $value->survived == "1" && $value->sex == "male";
                });
                return count($maleSurvivors);
                break;

            case 'female':
                $femaleSurvivors = $this->storage->filter(function ($key, Person $value) {
                    return $value->survived == "1" && $value->sex == "female";
                });
                return count($femaleSurvivors);
                break;

            default:
                throw new Exception("Sex must be 'male' or 'female' but is '$sex'", 1);
                break;
        }
    }

    /***
     * @param string $sex  must be 'male' or 'female'
     * @param string $class  must be '1' or '2' or '3'
     */
    public function findAllSurvivorsBySexAndClass(string $sex, string $class): int
    {
        switch ($sex) {
            case 'male':
                switch ($class) {
                    case '1':
                        $maleClass1Survivors = $this->storage->filter(function ($key, Person $value) {
                            return $value->survived == '1' && $value->sex == "male" && $value->pclass == '1';
                        });
                        return count($maleClass1Survivors);
                        break;
                    case '2':
                        $maleClass2Survivors = $this->storage->filter(function ($key, Person $value) {
                            return $value->survived == '1' && $value->sex == "male" && $value->pclass == '2';
                        });
                        return count($maleClass2Survivors);
                        break;
                    case '3':
                        $maleClass3Survivors = $this->storage->filter(function ($key, Person $value) {
                            return $value->survived == '1' && $value->sex == "male" && $value->pclass == '3';
                        });
                        return count($maleClass3Survivors);
                        break;

                    default:
                        throw new Exception("Class must be '1' or '2' or '3' but is '$class'", 2);
                        break;
                }

                break;

            case 'female':
                switch ($class) {
                    case '1':
                        $femaleClass1Survivors = $this->storage->filter(function ($key, Person $value) {
                            return $value->survived == '1' && $value->sex == "female" && $value->pclass == '1';
                        });
                        return count($femaleClass1Survivors);
                        break;
                    case '2':
                        $femaleClass2Survivors = $this->storage->filter(function ($key, Person $value) {
                            return $value->survived == '1' && $value->sex == "female" && $value->pclass == '2';
                        });
                        return count($femaleClass2Survivors);
                        break;
                    case '3':
                        $femaleClass3Survivors = $this->storage->filter(function ($key, Person $value) {
                            return $value->survived == '1' && $value->sex == "female" && $value->pclass == '3';
                        });
                        return count($femaleClass3Survivors);
                        break;

                    default:
                        throw new Exception("Class must be '1' or '2' or '3' but is '$class'", 2);
                        break;
                }
                break;

            default:
                throw new Exception("Sex must be 'male' or 'female' but is '$sex'", 1);
                break;
        }
    }
}
