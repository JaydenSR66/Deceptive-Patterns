<?php
// Initialise variables before loading the controller to avoid undefined variable warnings.
$title = "";
$cards= [];

// Load the lesson controller which populates $title and $cards.
require "../app/controllers/LessonController.php";
?>

<script src=/js/bootstrap.bundle.min.js></script>
<script src="/js/lesson.card.js"></script>