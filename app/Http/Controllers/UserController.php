<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Order;
use App\Models\Car;
use App\Models\OrderPhase;
use App\Models\WashingProgram;
use App\Models\WashingStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showDashboard()
    {
        $user = auth()->user();
        $users = User::orderBy('id', 'desc')->paginate(5);
        $roles = Role::all();
        $programs = WashingProgram::orderBy('id', 'desc')->paginate(5);
        $steps = WashingStep::paginate(5);
        //if user's role is client, then show only orders for that specific user
        if($user->role->name == 'client') {
            $orders = Order::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5);
        } else {
            $orders = Order::orderBy('id', 'desc')->paginate(5);    //if not, show all orders from all clients
        }
        
        $orderPhases = OrderPhase::all();

        //if the user has completed profile and has at least one car
        if($user->profile && $user->profile->cars) {
            $cars = Car::where('profile_id', $user->profile->id)->paginate(5);
            return view('layouts.dashboard-content', compact('users', 'roles', 'programs', 'steps', 'orders', 'orderPhases', 'cars'));
        }

        return view('layouts.dashboard-content', compact('users', 'roles', 'programs', 'steps', 'orders', 'orderPhases'));
        

        // dd($orders);
        
            
    }

    public function showUsers()
    {
        $users = User::with('role')->orderBy('id', 'desc')->paginate(5);

        return response()->json([
            'users' => $users
        ]);
    }


    public function showEditUsers(int $id)
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


    public function editUsers(Request $request, int $id)
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
    

    public function deleteUser(int $id)
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


    public function updatePassword(Request $request,int $id)
    {
        $user = User::where('id', $id)->first();

        $updatePassword = new UpdateUserPassword;

        return $updatePassword->update($user, $request->all());

    }


}
