<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representative;
use App\Models\School;

class RepresentativeController extends Controller
{
    public function create()
    {
        $schools = School::all();
        return view('representative', compact('schools'));
    }
    public function store(Request $request)
    {
        //$request->validate([
            //'school_id'  => 'required|exists:schools,id',
            //'email' => 'required|email|unique:representatives',
            //'name' => 'required|string|max:255',
        //]);
        $representative = new Representative();
        $representative->representativeName = $request->input('representativeName');
        $representative->email =$request->input('email');
        $representative->representativeid =$request->input('representativeid');

        $representative->save();

        Representative::create($request->all());
        return redirect()->route('representative.store')->with('success', 'Representative registered successfully!');

    }
    public function displayRepresentativeDetails()
    {
        $representatives = Representative::all();

        //if($representatives->isEmpty()) {
            //dd('No Representatives');
        
        return view ('representatives', ['representatives' => $representatives]);
    }
}
