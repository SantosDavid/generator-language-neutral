<?php

namespace App\Services\Language\Visitor;

use App\Services\Language\Definition;

class PHPVisitor implements Visitor
{
    private $result;

    public function startTag(Definition $definition): void
    {
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

    public function getResult()
    {
        return $this->result;
    }
}
