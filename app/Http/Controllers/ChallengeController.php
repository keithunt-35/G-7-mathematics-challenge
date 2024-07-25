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
        $challenges = new Challenge();
    $challenges->challengeId = $request->input('challengeId');
    $challenges->duration = $request->input('duration');
    $challenges->name = $request->input('name');
    $challenges->startDate = $request->input('startDate');
    $challenges->endDate =$request->input('endDate');
    $challenges->noOfQuestions =$request->input('noOfQuestions');

    $challenges->save();

        //Challenge::create($request->all());
        return redirect()->route('challenges.create')->with('success', 'Challenge added successfully!');    
    }
}
