<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Challenge;
use App\Models\Question;
use App\Models\Answer;
use App\Imports\QuestionsImport;
use App\Imports\AnswersImport;
use Illuminate\Support\Facades\Log;

class QuestionsController extends Controller
{
    public function uploadQuestions(Request $request)
{
    $this->validate($request, [
        'questions_file'=> 'required|mimes:xlsx',
        'answers_file'=> 'required|mimes:xlsx',
    ]);

    $questionsFile = $request->file('questions_file');
    $answersFile = $request->file('answers_file');

    $_challenge = Challenge::create(['name' => 'New Challenge']);     

    Excel::import(new QuestionsImport($_challenge), $questionsFile->getPathname());

    $questions = $_challenge->questions;

    foreach ($questions as $question) {
        Excel::import(new AnswersImport($question), $answersFile->getPathname());
    }

 

    return redirect()->route('challenges.create')->with('success', 'Questions and answers uploaded successfully!');
}
}
    
    