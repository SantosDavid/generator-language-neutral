<?php

namespace App\Services\Language\Visitor;

use App\Services\Language\Definition;

interface Visitor
{
    public function startTag(Definition $definition): void;

    public function propertyTag(Definition $definition): void;

    public function endTag(Definition $definition): void;
}
