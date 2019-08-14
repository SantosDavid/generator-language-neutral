<?php

namespace App\Services\Export;

use App\Services\Language\Visitor\Visitor;
use Illuminate\Support\Facades\File;

class FileExport
{
    public function export(Visitor $visitor): void
    {
        $path = storage_path();

        File::put(
            "{$path}/{$visitor->getClassName()}{$visitor->getExtension()}",
            $visitor->getResult()
        );
    }
}
