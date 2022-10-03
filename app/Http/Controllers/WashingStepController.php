<?php

namespace App\Http\Controllers;

use App\Models\WashingStep;
use Illuminate\Http\Request;

class WashingStepController extends Controller
{
    public function showSteps()
    {
        $steps = WashingStep::all();

        return view('layouts.washingSteps.all', compact('steps'));
    }

    public function showCreateSteps()
    {
        
    }

    public function showEditSteps($id)
    {
        
    }

    public function createSteps(Request $request)
    {
        
    }

    public function editSteps(Request $request, $id)
    {
        
    }

    public function deleteStep(Request $request, $id)
    {
        
    }
}
