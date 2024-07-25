<?php

namespace App\Imports;

use App\Models\Answer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AnswersImport implements ToModel, WithHeadingRow
{
    //private $question;

   // public function __construct(Question $question)
    //{
        //$this->question = $question;
    //}
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info('Processing row in Answers Import:', $row);
        return new Answer([
            'answerId' => $row['answerId'],
            'questionId' => $row['questionId'],
            'answer'=> $row['answer'],
            'isCorrect' => $row['isCorrect'],
        ]);

      

        }
    }
    
