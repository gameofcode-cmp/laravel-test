<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\School;
use App\Models\Email;
use App\Models\SchoolProfileMapping;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function add()
    {
        $schools = School::all();
        return view('profiles.add', compact('schools'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:users,email',
            'school_id' => 'required|exists:schools,schoolID',
        ]);

        DB::transaction(function () use ($validatedData) {
            // Create User
            $profile = new Profile();
            $profile->firstname = $validatedData['firstname'];
            $profile->surname = $validatedData['surname'];
            $profile->save();

            // Create default email
            $email = new Email;
            $email->UserRefID = $profile->UserRefID;
            $email->emailaddress = $validatedData['email'];
            $email->Default = 1;
            $email->save();

            // Create a SchoolMapping
            $mapping = new SchoolProfileMapping;
            $mapping->schoolID = $validatedData['school_id'];
            $mapping->UserRefID = $profile->UserRefID;
            $mapping->save();
        });

        return redirect()->route('profiles.add')->with('success', 'Profile added successfully!');
    }
}
