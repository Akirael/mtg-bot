<?php

namespace App\Component\Check;

class CheckLanguage
{
    /**
     * @param string $name
     * @return string
     */
    public function check(string $name): string
    {
        return preg_match('/[a-zA-Z \,\.]/', $name) ? 'en' : 'ru';
    }
}