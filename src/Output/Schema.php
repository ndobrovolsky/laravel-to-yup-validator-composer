<?php

namespace Ndobrovolsky\LaravelToYupValidator\Output;

use Stringable;

class Schema implements Stringable
{
    protected $name;
    protected $rules;

    public function __construct(string $name, array $rules)
    {
        $this->name = $name;
        $this->rules = $rules;
    }

    public function __toString(): string
    {

        return <<<HTML
        var {$this->name} = yup.object({
                        {$this->getRulesLayout()}
                });\n\t
        HTML;
    }

    private function getRulesLayout(): string
    {
        $layout = '';
        foreach ($this->rules as $name => $rule) {
            $layout .= "{$name}: {$rule},\n\t\t";
        }

        return trim($layout);
    }
}
