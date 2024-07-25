<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'reportId',
        'participantId',
        'challengeId'
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
