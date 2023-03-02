<?php

namespace Ndobrovolsky\LaravelToYupValidator\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Ndobrovolsky\LaravelToYupValidator\Output\Script;
use Ndobrovolsky\LaravelToYupValidator\Input\FormResourceReader;
use Ndobrovolsky\LaravelToYupValidator\Generator\RulesGenerator;

class GenerateValidationScript extends Command
{
    protected $signature = 'laravel-to-yup-validator:generate';

    protected $description = 'Generate a JavaScript file containing you validation rules.';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $path = config('laravel_to_yup_validator.script_path');
        $generated = $this->generate();

        $this->info('Generating validation script...');
        $this->makeDirectory($path);
        $this->files->put(base_path($path), $generated);

        $this->info('Validation script generated successfully!');
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory(dirname(base_path($path)))) {
            $this->files->makeDirectory(dirname(base_path($path)), 0755, true, true);
        }

        return $path;
    }

    private function generate()
    {
        $reader = new FormResourceReader();
        $resources = $reader->getInstances();
        $schemas = [];

        foreach ($resources as $name => $instance) {
            $rules = $instance->rules();
            $data = RulesGenerator::generate($rules);
            $schemas[$name] = $data;
        }

        return count($schemas) > 0 ? new Script($schemas) : '';
    }
}
