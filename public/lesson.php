<?php
// Initialise variables before loading the controller to avoid undefined variable warnings.
$title = "";
$cards= [];

// Load the lesson controller which populates $title and $cards.
require "../app/controllers/LessonController.php";
?>
<div class="container mt-3">
    <div class="d-flex justify-content-between mb-1">
        <span>Lesson Progress</span>
        <span id="lessonProgressText"></span>
    </div>

    <div class="progress" style="height: 20px;">
        <div
            id="lessonProgressBar"
            class="progress-bar bg-primary"
            role="progressbar"
            style="width: 0%;">
        </div>
    </div>
</div>
<script src=/js/bootstrap.bundle.min.js></script>
<script src="/js/lesson.card.js"></script>