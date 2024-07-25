<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    
    protected $fillable = [
        'attemptId',
        'participantId',
        'challengeId',
        'score',
        'timeTaken'
    ];

    public function participant()
    {
        return $this->belongsTo('App\Models\Participant');
    }

    public function challenge()
    {
        return $this->belongsTo('App\Models\Challenge');
    }
}
