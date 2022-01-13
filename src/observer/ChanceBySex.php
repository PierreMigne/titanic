<?php

namespace App\observer;

use SplObserver;
use SplSubject;

class ChanceBySex implements SplObserver
{

    public function update(SplSubject $subject): void
    {
        // $this->storage = $subject->total();
    }
}
