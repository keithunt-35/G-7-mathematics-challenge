<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participants;
use App\Http\Controllers\Controller;

class ParticipantsController extends Controller
{
    public function displayParticipantDetails()
    {
        $participants = Participants::all();

        if($participants->isEmpty()) {
            dd('No Participants registered');
        }
        return view ('participants', compact('participants'));
    }
}
