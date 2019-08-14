<?php

namespace App\Services\Language\Visitor;

use App\Services\Language\Definition;

abstract class Visitor
{
    protected $result;

    protected $className;

    public abstract function startTag(Definition $definition): void;

    public abstract function propertyTag(Definition $definition): void;

    public abstract function endTag(Definition $definition): void;

    public abstract function getExtension(): string;
    
    public function getResult()
    {
        return $this->result;
    }

    public function getClassName(): string
    {
        return $this->className;
    }
}
