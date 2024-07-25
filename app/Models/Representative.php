<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $fillable = [
        'email', 
        'representativeName', 
        'representativeid'
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
