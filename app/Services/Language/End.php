<?php

namespace App\Services\Language;

use App\Enums\Flag;
use App\Services\Language\Visitor\Visitor;

class End extends Definition
{
    public function flag(): string
    {
        return Flag::END();
    }

    public function visitor(Visitor $visitor): void
    {
        $visitor->endTag($this);
    }
}
