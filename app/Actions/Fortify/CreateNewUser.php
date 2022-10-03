<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
        $validator = Validator::make($input, [
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class)
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['string', 'max:32']
        ]);


        if($validator->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } 

        /**
         * if user has been created by admin, this block 
         * of code will be executed
         */
        if(isset($input['role'])) {

            $role = Role::where('name', $input['role'])->first();

            User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_id' => $role->id
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'User successfully created!'
            ]);

        } 

        /**
         * if user has been created using registration form
         * then it will have role client by default
         */
        User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => 3
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User successfully created!'
        ]);
    }
}
