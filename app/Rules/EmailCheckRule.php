<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class EmailCheckRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check main email exist
        $account = User::where('email', $value)->first();

        // Check backup email exist
        if (!isset($account)) {
            $account = User::where('email_2', $value)->first();
        }

        return isset($account);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "can't find user email! please check your email or backup email is correct!";
    }
}
