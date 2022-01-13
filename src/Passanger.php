<?php

namespace App;

use App\model\Person;
use LogicException;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class Passanger  implements SplSubject
{
    public $sex;
    public $classe;
    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function setPerson(string $name, string $sex, string $pclass)
    {
        $this->person = new Person(name: $name, pclass: $pclass, sex: $sex);
        $this->sex = $sex;
        $this->classe = $pclass;
        $this->notify();
    }

    // public function getSex()
    // {
    //     return $this->sex;
    // }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer); // SplObjectStorage
    }

    public function detach(SplObserver $observer): void
    {
        if ($this->observers->contains($observer))
            $this->observers->detach($observer);
    }

    public function notify(): void
    {
        if ($this->observers->count() === 0)
            throw new LogicException("Zero Observer ...");

        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
