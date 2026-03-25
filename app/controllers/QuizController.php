<?php

// Get the JSON from the quiz data file.
$json = file_get_contents(__DIR__ . '/../data/quiz.json');

// If the file couldn't be read, dies and show an error message.
if (!$json)
{
    die("Could not open json file");
}

// Decode the JSON string into an array.
$quizData = json_decode($json, true);


// Extract the quiz data into separate variables.
$title = $quizData['title'];
$description = $quizData['description'];
$questions = $quizData['questions'];
$explanation = $quizData['explanation'];
