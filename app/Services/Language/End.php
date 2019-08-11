<?php

namespace App\Services\Language;

use App\Enums\Flag;

class End extends Definition
{
    public function flag(): string
    {
        return Flag::END();
    }
}
