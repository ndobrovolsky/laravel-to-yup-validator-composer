<?php

namespace Ndobrovolsky\LaravelToYupValidator\Output;

use Stringable;

class Script implements Stringable
{
    protected $schemas;

    public function __construct(array $schemas)
    {
        $this->schemas = $schemas;
    }

    public function __toString(): string
    {
        return <<<JAVASCRIPT
            import yup from 'yup';
            
            var ltyValidation = {}

            if(yup){
                ltyValidation = {
                    {$this->getSchemaLayout()}
                }
            }
            export default ltyValidation;
        JAVASCRIPT;
    }

    private function getSchemaLayout(): string
    {
        $schemaLayout = '';
        foreach ($this->schemas as $name => $rules) {
            $schemaLayout .= "{$name}: yup.object().shape({\n\t\t\t{$this->getRulesLayout($rules)}\n\t\t}),\n\t\t";
        }

        return $schemaLayout;
    }

    private function getRulesLayout($rules): string
    {
        $layout = '';
        foreach ($rules as $name => $rule) {
            $layout .= "{$name}: {$rule},\n\t\t";
        }

        return trim($layout);
    }
}
