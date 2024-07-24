<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifiedParticipant extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'participantId',
        'chances',
        'remainingQuestions',
        'remainingTime'
    ];

    protected $table = 'verified_participants';

    protected $primaryKey = 'participantId';

    public function participant()
    {
        return $this->belongsTo('App\Models\Participant');
    }   
}
