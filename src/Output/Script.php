<?php

namespace Ndobrovolsky\LaravelToYupValidator\Output;

use Stringable;
use Ndobrovolsky\LaravelToYapValidator\Output\Schema;

class Script implements Stringable
{
    protected $schemas;

    public function __construct(array $schemas)
    {
        $this->schemas = $schemas;
    }

    public function __toString(): string
    {
        return <<<HTML
        <script type="module">
            import yup from 'yup';
            if(yup){
                windows.ltyValidator = {
                    yup,
                    schemas: {
                        {$this->getSchemaLayout()}
                    }
                }
            }
        </script>
        HTML;
    }

    private function getSchemaLayout(): string
    {
        $schemaLayout = '';
        foreach ($this->schemas as $name => $rules) {
            $schemaLayout .= (new Schema($name, $rules));
        }

        return $schemaLayout;
    }
}
