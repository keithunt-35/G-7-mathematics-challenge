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

    public function mostCorrectlyAnsweredQuestions()
{
    // Example query to get questions with highest correct answers
    $questions = Question::select('question_text')
        ->withCount(['quizAttempts as correct_attempts_count' => function ($query) {
            $query->whereColumn('questions.id', 'quiz_attempts.question_id')
                ->where('quiz_attempts.is_correct', true);
        }])
        ->orderByDesc('correct_attempts_count')
        ->limit(10)
        ->get();

    return view('analytics.most_correctly_answered_questions', ['questions' => $questions]);
}

public function schoolRankings()
{
    // Example query to rank schools by average score of their participants
    $schoolRankings = School::withAvg('participants.quizAttempts.score')
        ->orderByDesc('participants_quiz_attempts_avg_score')
        ->get();

    return view('analytics.school_rankings', ['schoolRankings' => $schoolRankings]);
}

public function repetitionPercentage($participantId)
{
    $repeatedQuestionsCount = QuizAttempt::where('participant_id', $participantId)
        ->distinct('question_id')
        ->count();

    $totalQuestionsAttempted = QuizAttempt::where('participant_id', $participantId)
        ->count();

    if ($totalQuestionsAttempted > 0) {
        $repetitionPercentage = ($repeatedQuestionsCount / $totalQuestionsAttempted) * 100;
    } else {
        $repetitionPercentage = 0;
    }

    return view('analytics.repetition_percentage', [
        'participantId' => $participantId,
        'repetitionPercentage' => $repetitionPercentage,
    ]);
}


public function worstPerformingSchools($challengeId)
{
    $worstPerformingSchools = School::whereHas('participants.quizAttempts', function ($query) use ($challengeId) {
        $query->where('challenge_id', $challengeId);
    })
    ->withAvg('participants.quizAttempts.score')
    ->orderBy('participants_quiz_attempts_avg_score')
    ->limit(10)
    ->get();

    return view('analytics.worst_performing_schools', ['worstPerformingSchools' => $worstPerformingSchools]);
}

}

