<?php

namespace App\Services\Language;

use App\Enums\Flag;

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
}
