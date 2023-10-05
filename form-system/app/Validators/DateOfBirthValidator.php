<?php

namespace App\Validators;

use Carbon\Carbon;
use Illuminate\Validation\Validator;

class DateOfBirthValidator extends Validator
{
    /**
     * Validates if the date of birth is valid
     *
     * @param  mixed $attribute
     * @param  mixed $value
     * @param  mixed $parameters
     * @return int
     */
    public function validateMaxAge($attribute, $value, $parameters)
    {
        $maxAge = $parameters[0];

        $dateOfBirth = Carbon::parse($value);
        $currentDate = Carbon::now();

        return $dateOfBirth->diffInYears($currentDate) <= $maxAge;
    }
}
