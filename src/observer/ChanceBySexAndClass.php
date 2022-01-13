<?php

namespace App\observer;

use SplObserver;
use SplSubject;

class ChanceBySexAndClass implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        // $this->storage = $subject->total();
    }
}
