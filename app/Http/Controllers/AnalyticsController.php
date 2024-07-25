<?php

// app/Http/Controllers/AnalyticsController.php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalQuizzes = Quiz::count();
        $totalQuizAttempts = QuizAttempt::count();
        $averageScore = QuizAttempt::avg('score');

        // Additional analytics logic...

        return view('analytics.index', [
            'totalQuizzes' => $totalQuizzes,
            'totalQuizAttempts' => $totalQuizAttempts,
            'averageScore' => $averageScore,
        ]);
    }
}

