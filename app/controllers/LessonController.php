<?php

// Get he JSON from the lesson data file.
$json = file_get_contents(__DIR__ . '/../data/lessons.json');

// If the file couldn't be read, dies and show an error message.
if (!$json)
{
    die("Could not open json file");
}

// Decode the JSON string into a PHP array.
$lessonData = json_decode($json, true);


// Extract the lesson title and cards into separate variables.
$title = $lessonData['title'];
$cards = $lessonData['cards'];
