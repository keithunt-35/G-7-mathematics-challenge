<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Challenge;
use Illuminate\Support\Facades\Log;

class QuestionsImport implements ToModel, WithHeadingRow
{
    private $challenge;

    public function __construct(Challenge $challenge)
    {
        $this->challenge = $challenge;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info('Processing row in Questions Import: ', $row);
        return Question::create([
            'question_text' => $row['question_text'],
            'marks' => $row['marks'],
            'challenge_id' => $this->challenge->id,
        ]);
        //$question->save(); // Save the question to the database
    //return $question;
    }
}
