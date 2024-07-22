<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = '_challenges';
    protected $fillable = ['name', 'challengeId', 'startDate', 'endDate', 'duration', 'noOfQuestions'];

    public function questions()
{
    return $this->hasMany(Question::class);
}

}
