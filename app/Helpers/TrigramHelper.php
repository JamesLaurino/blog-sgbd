<?php

namespace App\Helpers;

class TrigramHelper
{
    public static function toTrigram(string $name): array
    {
        return [
            'firstLetter' => strtoupper(substr($name, 0, 1)),
            'lastLetters' => strtoupper(substr($name, -2)),
            'color' => substr(hash('sha256', $name), 0, 6),
        ];
    }
}
