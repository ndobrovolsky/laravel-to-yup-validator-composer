<?php

namespace Ndobrovolsky\LaravelToYapValidator\Output;

use Stringable;

class Rules implements Stringable
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
        {$this->name}: yup.object({
                        {$this->getRulesLayout()}
                }),\n\t
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
