<?php

namespace App\Services\Language\Visitor;

use App\Services\Language\Definition;

class PHPVisitor extends Visitor
{
    public function startTag(Definition $definition): void
    {
        $this->className = $definition->getName();

        $this->result .= "<?php\nclass {$definition->getName()} {\n";
    }

    public function propertyTag(Definition $definition): void
    {
        $this->result .= "  private \${$definition->getName()};\n";
    }

    public function endTag(Definition $definition): void
    {
        $this->result .= "}\n";
    }

    public function getExtension(): string
    {
        return '.php';
    }
}
