<?php

namespace App\Http\Controllers;

use App\Models\WashingStep;
use Illuminate\Http\Request;

class WashingStepController extends Controller
{

    public function showCreateSteps()
    {
        return view('layouts.washingSteps.create');
    }

    public function showEditSteps(int $id)
    {
        $step = WashingStep::where('id', $id)->first();
     

        if($step) {
            return view('layouts.washingSteps.edit', compact('step'));
        } else {
            return abort(404, 'Program Step not found');
        }
    }

    public function createSteps(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WashingStep::create($request->except(['_token', '_method']));
        
        return redirect(route('dashboard.show'))->with(["response-message" => "Successfully created new Program Step"]);
    }

    public function editSteps(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $step = WashingStep::find($id);

        if($step) {
            $step->update($request->except(['_token', '_method']));
        
            return redirect(route('dashboard.show'))->with(["response-message" => "Successfully updated Program Step"]);
        } else {
            return abort(404, 'Program Step not found');
        }
        
    }

    public function deleteStep(int $id)
    {
        $step = WashingStep::where('id', $id)->first();

        if($step) {
            WashingStep::where('id', $id)->delete();
            
            return redirect(route('dashboard.show'))->with(["response-message" => "Successfully deleted the Program Step"]);
        } else {
            return abort(404, 'Program Step not found');
        }
    }
}
