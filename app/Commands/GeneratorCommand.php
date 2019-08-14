<?php

namespace App\Commands;

use App\Services\Export\FileExport;
use App\Services\Language\Builder\BuilderLanguageService;
use App\Services\Language\Visitor\NodeVisitor;
use App\Services\Language\Visitor\PHPVisitor;
use App\Services\Language\Visitor\Visitor;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class GeneratorCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'generator {file : Path to file with definitions (required)}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Generate language neutral from file';

    private $visitors;

    public function __construct(PHPVisitor $PHPVisitor, NodeVisitor $nodeVisitor)
    {
        parent::__construct();

        $this->visitors = collect([$PHPVisitor, $nodeVisitor]);
    }

    /**
     * Execute the console command.
     *
     * @param BuilderLanguageService $builderLanguage
     * @param FileExport $fileExport
     * @return mixed
     */
    public function handle(BuilderLanguageService $builderLanguage, FileExport $fileExport)
    {
        $path = $this->input->getArgument('file');

        parse_file_to_builder($path, $builderLanguage);

        $languageService = $builderLanguage->getLanguage();

        $this->visitors->each(function (Visitor $visitor) use ($languageService, $fileExport) {
            $languageService->visitor($visitor);

            $fileExport->export($visitor);
        });
    }

    /**
     * Define the command's schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
