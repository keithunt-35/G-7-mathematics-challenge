<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $fillable = ['schoolId', 'firstName', 'lastName', 'email', 'dateOfBirth', 'participantId', 'username', 'password'];
}
