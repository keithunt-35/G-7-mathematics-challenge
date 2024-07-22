<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AnswersImport implements ToModel, WithHeadingRow
{
    private $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $question = Question::firstOrFail($row['questionId']);

        Log::info('Processing row in Answers Import: ' . json_encode($row));
        //$question = $this->question->where('question_text', $row['questionId'])->first();
        //$questionId = $row['questionId'];
        //$question = Question::find($questionId);
        //if ($question) {
            return $question->answers()->create([                
                'question_id' => $question->id,
                'answer_text' => $row['answer'],
                'is_correct' => $row['is_correct'],
                'answer_id' => Str::uuid()->toString(),
            ]);
            //$answer->save(); // Save the answer to the database
        //return $answer;
        }
        //return null;
    }
