<?php

namespace App\Rules;

use App\Constants\BookingConstants;
use Closure;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Available implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  Closure(string): PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail): void
    {
        if($value === BookingConstants::UNAVAILABLE) {
            $fail('This product is unavailable for booking.');
        }
    }
}
