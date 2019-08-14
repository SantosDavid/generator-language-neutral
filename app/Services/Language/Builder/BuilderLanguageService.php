<?php

namespace App\Services\Language\Builder;

use App\Services\Language\End;
use App\Services\Language\LanguageService;
use App\Services\Language\Property;
use App\Services\Language\Start;

class BuilderLanguageService
{
    /**
     * @var LanguageService
     */
    private $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function add($definition): BuilderLanguageService
    {
        $definition = explode(' ', $definition);

        $flag = $definition[0];

        $name = $definition[1] ?? null;

        $options = $definition[2] ?? null;

        switch ($flag) {
            case 'M':
                $child = new Start($name);
                break;
            case 'F':
                $child = new Property($name, $options);
                break;
            case 'E':
                $child = new End();
        }

        $this->languageService->addDefinition($child);

        return $this;
    }

    public function getLanguage(): LanguageService
    {
        return $this->languageService;
    }
}
