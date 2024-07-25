<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='answers';
    protected $fillable = ['questionId', 'answerId', 'isCorrect', 'answer'];

    public function question()
{
    return $this->belongsTo(Question::class, 'questionId');
}
}
