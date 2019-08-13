<?php

namespace App\Commands;

use App\Services\Language\Builder\BuilderLanguageService;
use App\Services\Language\Visitor\PHPVisitor;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use RuntimeException;
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

    /**
     * Execute the console command.
     *
     * @param BuilderLanguageService $builderLanguage
     * @param PHPVisitor $visitor
     * @return mixed
     */
    public function handle(BuilderLanguageService $builderLanguage, PHPVisitor $visitor)
    {
        $path = $this->input->getArgument('file');

        if (File::extension($path) !== 'txt') {
            throw new RuntimeException('the file type must be txt');
        }

        //TODO move operations with file
        $file = explode("\n", File::get($path));

        foreach ($file as $row) {
            if ($row !== '') {
                $builderLanguage->add($row);
            }
        }

        $languageService = $builderLanguage->getLanguage();

        $languageService->visitor($visitor);

        dump($visitor->getResult());
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
