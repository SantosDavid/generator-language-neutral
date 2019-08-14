<?php

namespace App\Services\Language\Visitor;

use App\Services\Language\Definition;

class NodeVisitor extends Visitor
{
    public function startTag(Definition $definition): void
    {
        $this->className = $definition->getName();

        $this->result .= "class {$definition->getName()} {\n";
    }

    public function propertyTag(Definition $definition): void
    {
        $this->result .= "{$definition->getName()};\n";
    }

    public function endTag(Definition $definition): void
    {
        $this->result .= "}\n";
    }

    public function getExtension(): string
    {
        return '.js';
    }
}
