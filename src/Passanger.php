<?php

namespace App;

use App\model\Person;
use LogicException;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class Passanger  implements SplSubject
{
    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function setPerson(string $name, string $sex, string $pclass)
    {
        new Person(name: $name, pclass: $pclass, sex: $sex);
    }

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
