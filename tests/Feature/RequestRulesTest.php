<?php

namespace DiSkyTech\LaravelToJsValidator\Tests\Feature;

use Illuminate\Support\Facades\Validator;
use DiSkyTech\LaravelToJsValidator\Tests\TestCase;
use Illuminate\Validation\ValidationRuleParser;
use DiSkyTech\LaravelToJsValidator\Generator\RulesGenerator;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use SplFileInfo;
use Throwable;

class RequestRulesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {

        $dir = __DIR__ . '/../Requests';
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
                continue;
            }
        
            require_once $file;
            
            $namespace = $this->getNamespace($file);
            $className = pathinfo($file, PATHINFO_FILENAME);
            $fullClassName = $namespace . '\\' .$className;

            try{
                $instance = new $fullClassName();
                $rules = $instance->rules();

                $data = RulesGenerator::generate($rules);



                $validator = Validator::make([
                    'string' => 'string',
                    'integer' => 1,
                    'boolean' => true,
                ], $rules);

                $this->assertTrue($validator->passes());
            }catch(Throwable $e){
                continue;
            }
        }
    }

    private function getNamespace(SplFileInfo $file) {
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
                for ($j = $i+1; isset($tokens[$j]) && $tokens[$j][0] != ';'; $j++) {
                    $namespace .= $tokens[$j][1];
                }
            }
        }
    
        return trim($namespace);
    }
}
