<?php

namespace App\Actions\Fortify;

use App\Models\Account;
use App\Models\Localization;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : ''
        ])->validate();


        if($input['role'] !== 'buyer' && $input['role'] !== 'seller'){
            $input['role'] = 'buyer';
        }


        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role']
        ]);

        dd($user);

        // 建立和使用者相關的內容
        Localization::create([
            'usr_id' => $user->id
        ]);

        Account::create([
            'usr_id' => $user->id
        ]);

        return $user;
    }
}
