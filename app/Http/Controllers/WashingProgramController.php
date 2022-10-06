<?php

namespace App\Http\Controllers;

use App\Models\WashingProgram;
use App\Models\WashingStep;
use Illuminate\Http\Request;

class WashingProgramController extends Controller
{

    public function showCreatePrograms()
    {
        $steps = WashingStep::all();

        return view('layouts.washingPrograms.create', compact('steps'));
    }

    public function showEditPrograms(int $id)
    {
        $program = WashingProgram::where('id', $id)->first();
        $steps = WashingStep::all();

        if($program) {
            return view('layouts.washingPrograms.edit', compact('program', 'steps'));
        } else {
            return abort(404, 'Program not found');
        }

    }

    public function createPrograms(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|regex:/[0-9]*\\.[0-9]+/i',
            'steps' => 'required|min:3'
        ]);

        $program = WashingProgram::create($request->except(['_token', '_method', 'steps']));

        $program->washingSteps()->sync($request->input('steps'));
        
        return redirect(route('dashboard.show'))->with(["response-message" => "Successfully created new program"]);

    }

    public function editPrograms(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|regex:/[0-9]*\\.[0-9]+/i',
            'steps' => 'required|min:3'
        ]);

        $program = WashingProgram::findOrFail($id);
        //dd($request->input('steps'));
        $program->update($request->except(['_token', '_method', 'steps']));

        $program->washingSteps()->sync($request->input('steps'));

        return redirect(route('dashboard.show'))->with(["response-message" => "Successfully updated program"]);
    }

    public function deleteProgram(int $id)
    {
        $program = WashingProgram::where('id', $id)->first();

        if($program) {
            $program->washingSteps()->detach();
            WashingProgram::where('id', $id)->delete();
            
            return redirect(route('dashboard.show'))->with(["response-message" => "Successfully deleted the program"]);
        } else {
            return abort(404, 'Program not found');
        }
        
    }
}
