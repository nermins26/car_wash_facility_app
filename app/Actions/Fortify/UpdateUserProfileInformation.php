<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        $validator = Validator::make($input, [
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class)->ignore($user->id)
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            'role' => ['string', 'max:32']
            ],
        ]);


        if($validator->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } 

        if(isset($input['role'])) {

            $role = Role::where('name', $input['role'])->first();

            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'username' => $input['username'],
                'email' => $input['email'],
                'role_id' => $role->id
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'User successfully updated!'
            ]);

        } else {

            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'username' => $input['username'],
                'email' => $input['email'],
                'role_id' => 3
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'User successfully updated!'
            ]);
        }


        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } 
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'username' => $input['username'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
