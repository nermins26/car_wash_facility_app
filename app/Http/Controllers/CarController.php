<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function showCreateCars()
    {
        return view('layouts.cars.create');
    }

    public function showEditCars(int $id)
    {
        $car = Car::where('id', $id)->first();

        if($car) {
            return view('layouts.cars.edit', compact('car'));
        } else {
            abort(404, 'No car found');
        }
    }

    public function createCars(Request $request)
    {
        $request->validate([
            'brend' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'year' => 'required|int|min:1970|max:2030'
        ]);

        DB::table('cars')
        ->insert([
            'brend' => $request->input('brend'),
            'model' => $request->input('model'),
            'color' => $request->input('color'),
            'year' => $request->input('year'),
            'profile_id' => auth()->user()->profile->id
        ]);

        return redirect(route('dashboard.show'))->with('response-message', 'Sucessfully added a car');
    }

    public function editCars(Request $request,int $id)
    {
        $car = Car::where('id', $id)->first();

        if($car) {

            $request->validate([
                'brend' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'year' => 'required|int|min:1970|max:2030'
            ]);
    
            DB::table('cars')
            ->where('id', $car->id)
            ->update([
                'brend' => $request->input('brend'),
                'model' => $request->input('model'),
                'color' => $request->input('color'),
                'year' => $request->input('year')
            ]);
    
            return redirect(route('dashboard.show'))->with('response-message', 'Sucessfully updated the car');
        } else {
            return abort(404, 'Car not found');
        }
    }

    public function deleteCar(int $id)
    {
        $car = Car::where('id', $id)->first();

        if($car){
            Car::where('id', $car->id)->delete();
            return redirect(route('dashboard.show'))->with('response-message', 'Sucessfully deleted the car');
        } else {
            return abort(404, 'Car not found');
        }
    }
}
