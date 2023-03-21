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


    public function getProfilesBySchool(Request $request, $schoolId = null)
    {
        $schools = School::all();
        $selectedSchoolId = $schoolId ?? $request->input('school_id') ?? null;

        if ($selectedSchoolId) {
            $school = School::find($selectedSchoolId);

            if (!$school) {
                return response()->json(['message' => 'School not found'], 404);
            }

            $profiles = Profile::join('school_profile_mapping', 'profiles.UserRefID', '=', 'school_profile_mapping.UserRefID')
                ->where('school_profile_mapping.schoolID', $selectedSchoolId)
                ->where('profiles.Deceased', false)
                ->select('profiles.Firstname', 'profiles.Surname')
                ->get();
        } else {
            $profiles = collect([]);
        }

        return view('profiles.index', compact('schools', 'profiles', 'selectedSchoolId'));
    }

    public function downloadCsv()
    {
        $profiles = Profile::with('schools', 'emails')
            ->orderBy('Firstname')
            ->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="profiles.csv"',
        ];

        $callback = function () use ($profiles) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['First name', 'Last name', 'School', 'Email']);

            foreach ($profiles as $profile) {
                $schoolNames = $profile->schools->pluck('Name')->implode(', ');
                $emailAddresses = $profile->emails->pluck('emailaddress')->implode(', ');
                fputcsv($file, [$profile->Firstname, $profile->Surname, $schoolNames, $emailAddresses]);
            }

            fclose($file);
        };

        return response()->streamDownload($callback, 'profiles.csv', $headers);
    }
}
