<?php

namespace Ndobrovolsky\LaravelToYupValidator\Output;

use Stringable;
use Ndobrovolsky\LaravelToYupValidator\Output\Schema;

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
        <script type="text/javascript">
            var yup = require('yup');
            if(yup){
                {$this->getSchemaLayout()}
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
