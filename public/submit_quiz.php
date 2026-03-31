<?php

header('Content-Type: application/json');

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Decode the incoming JSON body
$body = json_decode(file_get_contents('php://input'), true);

if (!isset($body['answers']) || !is_array($body['answers'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request: answers array required']);
    exit;
}

// Load quiz data
$json = file_get_contents(__DIR__ . '/../app/data/quiz.json');
if (!$json) {
    http_response_code(500);
    echo json_encode(['error' => 'Could not load quiz data']);
    exit;
}

$quizData = json_decode($json, true);
$questions = $quizData['questions'];
$userAnswers = $body['answers'];


function validateAnswer(int $selected, int $correct): bool
{
    return $selected === $correct;
}

$totalQuestions = count($questions);
$correctCount   = 0;
$results        = [];

foreach ($questions as $index => $question) {
    // If the user didn't answer this question treat it as unanswered -1
    $selected = isset($userAnswers[$index]) ? (int) $userAnswers[$index] : -1;
    $correct  = (int) $question['answer'];

    $isCorrect = ($selected !== -1) && validateAnswer($selected, $correct);

    if ($isCorrect) {
        $correctCount++;
    }

    $results[] = [
        'question'    => $question['question'],
        'selected'    => $selected,
        'correct'     => $correct,
        'is_correct'  => $isCorrect,
        'explanation' => $question['explanation'],
    ];
}

// Build percentage score (0 if no questions to avoid division by zero)
$percentage = $totalQuestions > 0 ? round(($correctCount / $totalQuestions) * 100) : 0;

// Assign a performance band used by frontend to colour the result
if ($percentage >= 80) {
    $band = 'success';
} elseif ($percentage >= 50) {
    $band = 'warning';
} else {
    $band = 'danger';
}

echo json_encode([
    'score'           => $correctCount,
    'total'           => $totalQuestions,
    'percentage'      => $percentage,
    'band'            => $band,
    'results'         => $results,
]);