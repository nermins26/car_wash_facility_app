<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfiles()
    {
        $profiles = Profile::all();

        return view('layouts.profiles.all', compact('profiles'));
    }

    public function showCreateProfiles()
    {
        
    }

    public function showEditProfiles($id)
    {
        
    }

    public function createProfiles(Request $request)
    {
        
    }

    public function editProfiles(Request $request, $id)
    {
        
    }

    public function deleteProfile(Request $request, $id)
    {
        
    }
}
