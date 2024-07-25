<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Challenge;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Log;

use App\Imports\QuestionsImport;
use App\Imports\AnswersImport;

class QuestionsController extends Controller
{
    public function uploadQuestions(Request $request)
{
    $request->validate([
        'questions_file'=> 'required|mimes:xlsx,xls',
        'answers_file'=> 'required|mimes:xlsx,xls',
    ]);

    $questions = $request->file('questions_file');
    $answers = $request->file('answers_file');
    
    $challenge = Challenge::create(['name' => 'New Challenge']);  
    
    DB::beginTransaction();

    try{
        Excel::import(new QuestionsImport, $questions);

        Excel::import(new AnswersImport, $answers);

        DB::commit();

        $questionCount = Question::count();
        $answersCount = Answer::count();

        Log::info("After import:{$questionCount}questions and {$answersCount}answers in database");
        
        return back()->with('success', 'Questions and Answers uploaded successfully.');        
        
    }catch(\Exception $e){
        DB::rollback();
        Log::error('Import failed:'. $e->getMessage());
        return back()->withErrors(['msg'=>'Upload failed']);
    }
}
}   
    



    
    