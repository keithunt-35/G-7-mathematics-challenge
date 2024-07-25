<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //protected $table = '_questions';
    protected $fillable = [
        'id', 
        'questionText', 
        'marks', 
        'challengeId'
    ];

        public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'questionId');
    }


}
