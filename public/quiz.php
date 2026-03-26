<?php
// Initialise variables before loading the controller to avoid undefined variable warnings.
$title = "";
$questions = [];

// Load the quiz controller which populates $title and $questions.
require "../app/controllers/QuizController.php";
?>

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/quiz.js"></script>