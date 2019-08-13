<?php

namespace App\Services\Language;

use App\Enums\Flag;
use App\Services\Language\Visitor\Visitor;

class Property extends Definition
{
    /**
     * @var string
     */
    private $options;

    public function __construct(string $name, string $options)
    {
        parent::__construct($name);

        $this->options = $options;
    }

    public function flag(): string
    {
        return Flag::PROPERTY();
    }

    public function visitor(Visitor $visitor): void
    {
        $visitor->propertyTag($this);
    }
}
