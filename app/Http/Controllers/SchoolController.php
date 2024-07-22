<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function create()
    {
        $schools = School::all();
        return view('schools', compact('schools'));
    }
    public function store(Request $request)
    {
        //$request->validate([
            //'name'=> 'required|string|max:255',
            //'district'=> 'required|string|max:255',
           // 'registration_number'=> 'required|string|max:255|unique:schools',
        //]);
    $school = new School();
    $school->name = $request->input('name');
    $school->district = $request->input('district');
    $school->registration_number = $request->input('registration_number');
    $school->representativeName = $request->input('representativeName');
    $school->email =$request->input('email');
    $school->schoolId =$request->input('schoolId');
    // Assuming other fields are also set similarly

    // Save the school record
    $school->save();

        School::create($request->all());
        return redirect()->route('schools.create')->with('success', 'School added successfully!');
    }
    public function displaySchoolDetails()
    {
        $schools = School::all();

        if($schools->isEmpty()) {
            dd('No Schools found');
        }
        return view ('schools', compact('schools'));
    }
}
