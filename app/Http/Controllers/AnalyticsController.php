<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator facade
use App\Models\Question;
use App\Models\School;
use App\Models\Participant;
use App\Models\Attempt;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        // Validate the challengeId parameter
        $validator = Validator::make($request->all(), [
            'challengeId' => 'required|integer', // Ensure challengeId is present and is an integer
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect('analytics')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Extract validated challengeId
        $challengeId = $request->input('challengeId');

        // Most correctly answered questions
        $mostCorrectlyAnsweredQuestions = Question::withCount(['answers' => function ($query) {
            $query->where('isCorrect', true);
        }])->orderBy('answers_count', 'desc')->get();

        // School rankings by number of participants
        $schoolRankings = School::withCount('participants')->orderBy('participants_count', 'desc')->get();

        // Performance of schools over the years
        $schoolPerformance = School::with(['participants.attempts' => function ($query) {
            $query->selectRaw('school_id, YEAR(created_at) as year, AVG(score) as average_score')
                  ->groupBy('school_id', 'year');
        }])->get();

        // List of worst performing schools for a given challenge
        $worstPerformingSchools = School::with(['participants.attempts' => function ($query) use ($challengeId) { // Pass $challengeId to closure
            $query->where('challenge_id', $challengeId)
                  ->orderBy('score', 'asc');
        }])->get();

        // List of best performing schools for all challenges
        $bestPerformingSchools = School::with(['participants.attempts' => function ($query) {
            $query->orderBy('score', 'desc');
        }])->get();

        // List of participants with incomplete challenges
        $incompleteChallenges = Participant::whereHas('attempts', function ($query) {
            $query->whereNull('completed_at'); // Assuming 'completed_at' indicates if the attempt was completed
        })->get();

        // Return the analytics view with the data
        return view('analytics.index', compact(
            'mostCorrectlyAnsweredQuestions', 
            'schoolRankings', 
            'schoolPerformance', 
            'worstPerformingSchools', 
            'bestPerformingSchools', 
            'incompleteChallenges',
            'challengeId' // Pass challengeId to view if needed
        ));
    }
}
