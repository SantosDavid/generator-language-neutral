<?php

namespace App\Services\Language;

use App\Enums\Flag;
use App\Services\Language\Visitor\Visitor;

class Start extends Definition
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function flag(): string
    {
        return Flag::START();
    }

    public function visitor(Visitor $visitor): void
    {
        $visitor->startTag($this);
    }
}
