<?php

namespace App\Services\Language;

use App\Enums\Flag;

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
}
