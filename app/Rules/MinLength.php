<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinLength implements Rule
{
    private $minLength;

    public function __construct($minLength)
    {
        $this->minLength = $minLength;
    }

    public function passes($attribute, $value)
    {
        return strlen($value) >= $this->minLength;
    }

    public function message()
    {
        return "El campo :attribute debe tener como mínimo {$this->minLength} caracteres.";
    }
}
