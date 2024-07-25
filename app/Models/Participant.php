<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    // Specify guarded attributes to prevent mass assignment vulnerabilities
    protected $guarded = [];

    // Specify fillable attributes for mass assignment
    protected $fillable = [
        'dateOfBirth',
        'email',
        'firstName',
        'lastName',
        'password',
        'schoolId',
        'username'
    ];

    // Define the table associated with the model
    protected $table = 'participants';

    // Define the primary key associated with the table
    protected $primaryKey = 'participantId';

    // Set the timestamp format
    protected $dateFormat = 'Y-m-d H:i:s';

    // Define the relationships
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    public function challenges()
    {
        return $this->belongsToMany('App\Models\Challenge')->withPivot('noOfQuestions', 'duration', 'startDate', 'endDate');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function attempts()
    {
        return $this->hasMany('App\Models\Attempt');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function verifiedParticipant()
    {
        return $this->hasOne('App\Models\VerifiedParticipant');
    }
  

}
