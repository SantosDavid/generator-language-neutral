<?php

namespace App\Services\Language;

use App\Enums\Flag;
use App\Services\Language\Visitor\Visitor;

class LanguageService extends Definition
{
    private $definitions;

    public function __construct()
    {
        parent::__construct(Flag::COLLECT());

        $this->definitions = collect([]);
    }

    public function addDefinition(Definition $definition)
    {
        $this->definitions->add($definition);
    }

    public function flag(): string
    {
        return Flag::COLLECT();
    }

    public function visitor(Visitor $visitor): void
    {
        $this->definitions->each(function (Definition $definition) use ($visitor) {
            $definition->visitor($visitor);
        });
    }
}
