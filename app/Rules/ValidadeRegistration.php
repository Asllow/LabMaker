<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidadeRegistration implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $registrationfalse;

    public function __construct($registrationfalse)
    {
        $this->registrationfalse = $registrationfalse;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {   
        if (is_null($this->registrationfalse) and is_null($value)){
            $fail("Você deve digitar o número de matrícula ou marcar a opção de não possuir um");
        } elseif (is_string($this->registrationfalse) and is_string($value)){
            $fail("Você não deve digitar o número de matrícula e marcar a opção de não possuir um");
        }
        
    }
}
