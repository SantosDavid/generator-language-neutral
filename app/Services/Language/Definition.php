<?php

namespace App\Services\Language;

abstract class Definition
{
    protected $name;

    public function __construct(string $name = null)
    {
        $this->name = $name;
    }

    public abstract function flag(): string;
}
