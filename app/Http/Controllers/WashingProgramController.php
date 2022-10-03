<?php

namespace App\Http\Controllers;

use App\Models\WashingProgram;
use Illuminate\Http\Request;

class WashingProgramController extends Controller
{
    public function showPrograms()
    {
        $programs = WashingProgram::all();

        return view('layouts.washingPrograms.all', compact('programs'));
    }

    public function showCreatePrograms()
    {
        
    }

    public function showEditPrograms($id)
    {
        
    }

    public function createPrograms(Request $request)
    {
        
    }

    public function editPrograms(Request $request, $id)
    {
        
    }

    public function deleteProgram(Request $request, $id)
    {
        
    }
}
