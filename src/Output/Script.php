<?php

namespace Ndobrovolsky\LaravelToYupValidator\Output;

use Stringable;

class Script implements Stringable
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __toString(): string
    {
        return <<<JAVASCRIPT
        import yup from 'yup';
        
        var validation = {}

        if (yup) {
            validation = {
                {$this->geValidationtLayout()}
            }
        }
        
        export default validation;
        JAVASCRIPT;
    }

    private function geValidationtLayout(): string{
        $layout = '';
        foreach($this->data as $name => $value){
            $layout .= "{$name}: {
            rules: yup.object().shape({
                {$this->getRulesLayout($value['rules'])}
            }),
            messages: {
                {$this->getMessagesLayout($value['messages'])}
            },
        },\n\t\t";
        }
        return trim($layout);
    }


    private function getRulesLayout($rules): string
    {
        $layout = '';
        foreach ($rules as $name => $rule) {
            $layout .= "{$name}: {$rule},\n\t\t\t\t";
        }

        return trim($layout);
    }

    private function getMessagesLayout($messages): string
    {
        $layout = '';
        foreach ($messages as $name => $items) {
            $layout .= "{$name}: {
                    {$this->getMessageLayout($items)}\n\t\t\t\t
                },\n\t\t\t\t";
        }

        return trim($layout);
    }

    private function getMessageLayout($items): string
    {
        $messages = '';
        foreach ($items as $name => $message) {
            $messages .= "{$name}: '{$message}',\n\t\t\t\t\t";
        }

        return trim($messages);
    }
}
