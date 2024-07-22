<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionsImport;
use App\Imports\AnswersImport;
use App\Models\Challenge;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'questions_file'=> 'required|mimes:xlsx',
            'answers_file'=> 'required|mimes:xlsx',
        ]);
        $challenge = Challenge::create(['name' => 'New Challenge']);

        $questionsFile = $request->file('questions_file');
        Excel::import(new QuestionsImport($challenge), $questionsFile);

        $answersFile = $request->file('answers_file');
        $questions = $challenge->questions;
        foreach ($questions as $question) {
            Excel::import(new AnswersImport($question), $answersFile);
        }

        return redirect()->back()->with('success', 'File imported successfully!');
    }
} 
