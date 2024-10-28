<?php

namespace Miniwork\Services;

use Miniwork\Enums\ConsoleStyles;

class ConsoleService
{
    public function writeLine(string|array $line, ConsoleStyles $style = null): void
    {
        if (!is_array($line)) {
            echo $style->value.$line.ConsoleStyles::ResetAllAttributes->value;
            return;
        }

        $result = '';
        foreach ($line as $text) {
            if ($text[1] instanceof ConsoleStyles) {
                $result .= $text[1]->value.$text[0].ConsoleStyles::ResetAllAttributes->value;
            } else {
                $result .= $text[1].$text[0].ConsoleStyles::ResetAllAttributes->value;
            }
        }

        echo $result.PHP_EOL;
    }
}