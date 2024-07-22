<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class ChallengeController extends Controller
{
    public function create()
    {
        $challenges = Challenge::all();
        return view('pages.challenges', compact('challenges'));
    }
    public function store(Request $request)
    {
        $_challenges = new Challenge();
    $_challenges->challengeId = $request->input('challengeId');
    $_challenges->duration = $request->input('duration');
    $_challenges->name = $request->input('name');
    $_challenges->startDate = $request->input('startDate');
    $_challenges->endDate =$request->input('endDate');
    $_challenges->noOfQuestions =$request->input('noOfQuestions');

    $_challenges->save();

        //Challenge::create($request->all());
        return redirect()->route('challenges.create')->with('success', 'Challenge added successfully!');    
    }
}
