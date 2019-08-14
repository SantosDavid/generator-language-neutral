<?php

use App\Services\Language\Builder\BuilderLanguageService;
use Illuminate\Support\Facades\File;

function parse_file_to_builder(string $path, BuilderLanguageService $builderLanguage)
{
    if (File::extension($path) !== 'txt') {
        throw new RuntimeException('the file type must be txt');
    }

    $file = explode("\n", File::get($path));

    foreach ($file as $row) {
        if ($row !== '') {
            $builderLanguage->add($row);
        }
    }
}
