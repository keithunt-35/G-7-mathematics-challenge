<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
      protected $fillable = [
        'question_id',
        'answerId', 
        'is_correct', 
        'text'
    ];


public function question()
{
    return $this->belongsTo('App\Models\Question');
}

public function participant()
{
    return $this->belongsTo('App\Models\Participant');
}


}
