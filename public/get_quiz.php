<?php

header('Content-Type: application/json');

$json = file_get_contents(__DIR__ . '/../app/data/quiz.json');

if (!$json) {
    http_response_code(500);
    echo json_encode(['error' => 'Could not load quiz data']);
    exit;
}

$quizData  = json_decode($json, true);

// Strip the correct answer with explanation from each question before
// sending to the frontend so they cannot be read from page source
$safeQuestions = array_map(function ($q) {
    return [
        'question' => $q['question'],
        'options'  => $q['options'],
    ];
}, $quizData['questions']);

echo json_encode([
    'title'       => $quizData['title'],
    'description' => $quizData['description'],
    'questions'   => $safeQuestions,
]);