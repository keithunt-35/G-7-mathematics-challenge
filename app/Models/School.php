<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name', 
        'district', 
        'registrationNo', 
        'email', 
        'representativeName', 
        'schoolId'
    ];
    public function participants()
    {
        return $this->hasMany('App\Models\Participant');
    }
    
}
