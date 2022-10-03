<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function showCars()
    {
        $cars = Car::all();

        return view('layouts.cars.all', compact('cars'));
    }

    public function showCreateCars()
    {
        
    }

    public function showEditCars($id)
    {
        
    }

    public function createCars(Request $request)
    {
        
    }

    public function editCars(Request $request, $id)
    {
        
    }

    public function deleteCar(Request $request, $id)
    {
        
    }
}
