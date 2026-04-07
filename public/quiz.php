<link rel="stylesheet" href="css/bootstrap.min.css">

<?php
$title = "";
$questions = [];

require "../app/controllers/QuizController.php";

$totalQuestions = count($questions);
if ($totalQuestions < 1) {
    $totalQuestions = 1;
}
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-1">
        <span>Question Progress</span>
        <span id="questionProgressText">1/<?php echo $totalQuestions; ?></span>
    </div>

    <div class="progress" style="height: 20px;">
        <div
            id="questionProgressBar"
            class="progress-bar bg-success"
            role="progressbar"
            style="width: <?php echo 100 / $totalQuestions; ?>%;"
            aria-valuenow="1"
            aria-valuemin="1"
            aria-valuemax="<?php echo $totalQuestions; ?>">
        </div>
    </div>

    <h1 class="display-4 mt-4"><?php echo htmlspecialchars($title); ?></h1>

    <p id="questionCounter" class="mb-3"></p>

    <div id="questions">
        <?php foreach ($questions as $index => $question): ?>
            <div class="card mb-3" data-explanation="<?php echo htmlspecialchars($question['explanation']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($question['question']); ?></h5>

                    <?php foreach ($question['options'] as $optionIndex => $option): ?>
                        <button
                            type="button"
                            class="btn btn-outline-primary option-btn d-block mb-2"
                            data-index="<?php echo $optionIndex; ?>"
                            data-answer="<?php echo $question['answer']; ?>"
                            onclick="selectAnswer(this)">
                            <?php echo htmlspecialchars($option); ?>
                        </button>
                    <?php endforeach; ?>

                    <p id="feedback-<?php echo $index; ?>" class="mt-2"></p>
                    <p id="explanation-<?php echo $index; ?>" class="mt-2"></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <button type="button" class="btn btn-secondary" onclick="changeQuestion(-1)">Previous</button>
        <button type="button" class="btn btn-primary" onclick="changeQuestion(1)">Next</button>
    </div>

    <div class="mt-3">
        <button type="button" id="submitQuiz" class="btn btn-success" onclick="submitQuiz()">Submit Quiz</button>
    </div>

    <div id="quizResult" class="mt-4" style="display: none;">
        <h3>Quiz Result</h3>
        <p><strong>Score:</strong> <span id="resultScore"></span></p>
        <p><strong>Percentage:</strong> <span id="resultPercentage"></span></p>
        <p id="resultMessage"></p>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/quiz.js"></script>