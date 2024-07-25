<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class QuestionsImport implements ToModel, WithHeadingRow
{
    //private $challenge;

    //public function __construct(Challenge $challenge)
    //{
        //$this->challenge = $challenge;
    //}

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info('Processing row in Questions Import:', $row);
        return new Question([
            'challengeId' => $row['challengeId'],
            'marks' => $row['marks'],
            'questionId' =>$row['questionId'],
            'questionText' => $row['questionText'],
        ]);
        
        //$question->save(); // Save the question to the database
    //return $question;
    }
}
