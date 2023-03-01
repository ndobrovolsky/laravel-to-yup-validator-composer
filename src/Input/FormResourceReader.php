<?php

namespace Ndobrovolsky\LaravelToYapValidator\Input;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use SplFileInfo;
use Throwable;

class FormResourceReader
{
    private $path;

    public function __construct(string $path = null)
    {
        if ($path === null) {
            $resourcesPath = config('laravel-to-yup-validator.resources_path', 'app/Http/Requests');
            $this->path = realpath(app_path()) . '/' . $resourcesPath;
        } else {
            $this->path = $path;
        }
    }

    public function getInstances(): array
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->path));
        $instances = [];

        foreach ($files as $file) {
            try {
                if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
                    continue;
                }
                require_once $file;

                $namespace = $this->getNamespace($file);
                $className = pathinfo($file, PATHINFO_FILENAME);
                $fullClassName = $namespace . '\\' . $className;
                $instances[$className] = new $fullClassName();
            } catch (Throwable $e) {
                continue;
            }
        }

        return $instances;
    }

    private function getNamespace(SplFileInfo $file)
    {
        $filePath = $file->getRealPath();
        $content = file_get_contents($filePath);
        $namespace = "";

        $tokens = token_get_all($content);
        for ($i = 0; isset($tokens[$i]); $i++) {
            if (!isset($tokens[$i][0])) {
                continue;
            }

            if (T_NAMESPACE === $tokens[$i][0]) {
                $namespace = "";
                for ($j = $i + 1; isset($tokens[$j]) && $tokens[$j][0] != ';'; $j++) {
                    $namespace .= $tokens[$j][1];
                }
            }
        }

        return trim($namespace);
    }
}
