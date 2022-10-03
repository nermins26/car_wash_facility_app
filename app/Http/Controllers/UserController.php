<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Order;
use App\Models\WashingProgram;
use App\Models\WashingStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function showDashboard()
    {
        $users = User::paginate(2);
        $roles = Role::paginate(2);
        $programs = WashingProgram::paginate(2);
        $steps = WashingStep::paginate(2);
        $orders = Order::paginate(2);

        // dd($orders);
        return view('layouts.dashboard', compact('users', 'roles', 'programs', 'steps', 'orders'));
            
    }

    public function showUsers()
    {
        $users = User::with('role')->orderBy('id', 'desc')->paginate(5);

        return response()->json([
            'users' => $users
        ]);
    }


    public function showCreateUsers()
    {
        dd('show create');
    }

    public function showEditUsers($id)
    {
        $user = User::where('id', $id)->with('role')->first();

        if(!$user) {
            return response()->json([
                "status" => 404,
                "message" => "User not found"
            ]);
        }

        return response()->json([
            "status" => 200,
            "user" => $user
        ]);
    }

    public function createUsers(Request $request)
    {
        $newUser = new CreateNewUser;

        return $newUser->create($request->all());

    }

    public function editUsers(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if(!$user) {
            return response()->json([
                "status" => 404,
                "message" => "User not found"
            ]);
        }

        $updateUser = new UpdateUserProfileInformation;

        return $updateUser->update($user, $request->all());

    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();

        if($user) {
            DB::table('users')
            ->where('id', $id)
            ->delete();

            return response()->json([
                "status" => 200,
                "message" => "User has been deleted!"
            ]);
        } else {
            return response()->json([
                "status" => 404,
                "message" => "User not found"
            ]);
        }
    }


    public function updatePassword(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $updatePassword = new UpdateUserPassword;

        return $updatePassword->update($user, $request->all());

    }


    public function showCreateProfile()
    {
        dd("proslo");
    }
}
