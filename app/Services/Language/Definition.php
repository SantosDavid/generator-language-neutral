<?php

namespace App\Services\Language;

use App\Services\Language\Visitor\Visitor;

abstract class Definition
{
    protected $name;

    public function __construct(string $name = null)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public abstract function flag(): string;

    public abstract function visitor(Visitor $visitor): void;
}
