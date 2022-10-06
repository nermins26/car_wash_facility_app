<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;


class ProfileController extends Controller
{

    public function showCreateProfiles()
    {
        $userController = new UserController;

        return $userController->showDashboard();
    }


    public function createProfiles(Request $request)
    {
        $request->validate([
            'first_name' => "required|string|max:255",
            'last_name' => "required|string|max:255",
            'address' => "required|string|max:255",
            'phone' => "required|string|max:255"
        ]);

        DB::table('profiles')->insert([
            'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone'),
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('dashboard.show'))->with('response-message', 'Sucessfully created profile');
    
    }

    public function editProfiles(Request $request,int $id)
    {
        $profile = Profile::where('user_id', $id)->first();

        if($profile) {
            $request->validate([
                'first_name' => "required|string|max:255",
                'last_name' => "required|string|max:255",
                'address' => "required|string|max:255",
                'phone' => "required|string|max:255"
            ]);

            DB::table('profiles')
            ->where('id', $profile->id)
            ->update([
                'first_name'=> $request->input('first_name'),
                'last_name'=> $request->input('last_name'),
                'address'=> $request->input('address'),
                'phone'=> $request->input('phone'),
            ]);
    
            return redirect(route('dashboard.show'))->with('response-message', 'Sucessfully updated profile');
        } else {
            return abort(404, 'No profile found');
        }

    }

}
