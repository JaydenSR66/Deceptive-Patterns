<?php
// Initialise variables before loading the controller to avoid undefined variable warnings.
$title = "";
$questions = [];

// Load the quiz controller which populates $title and $questions.
require "../app/controllers/QuizController.php";
?>
<!--
    Result section — hidden until the quiz is submited
    displayResult() in quiz js populates the data attributes and text elements
     The following data
    attributes are always set after submission:
      data-score       e.g. "3"
      data-total       e.g. "5"
      data-percentage  e.g. "60"
      data-band        "success" | "warning" | "danger"
-->
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/quiz.js"></script>