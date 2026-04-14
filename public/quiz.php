<?php
// Initialise variables before loading the controller to avoid undefined variable warnings.
$title = "";
$questions = [];

// Load the quiz controller which populates $title and $questions.
require "../app/controllers/QuizController.php";
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel = 'stylesheet' integrity = 'sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin = 'anonymous'>
        <style> #questions .card {display:none;} </style>
        <title> <?php echo htmlspecialchars($title ?: "Deceptive Patterns Quiz"); ?> </title>
    </head>

    <body class = "bg-light">

        <!-- Progress Bar -->
        <div class="container mt-3">

            <h5 id = "questionCounter"></h5>

            <div class="d-flex justify-content-between mb-1">

                <span>Question Progress</span>

                <span id="questionProgressText"></span>

            </div>

            <div class="progress" style="height: 20px;">

                <div

                    id="questionProgressBar"
                    class="progress-bar bg-success"
                    role="progressbar"
                    style="width: 0%;">

                </div>

            </div>

        </div>

        <!-- Quiz Card -->
        <div id = "questions">

            <?php foreach ($questions as $qIndex => $question): ?>

                <div class="card mb-4"
                    data-question-index="<?php echo $qIndex; ?>"
                    data-explanation="<?php echo htmlspecialchars($question["explanation"] ?? '', ENT_QUOTES, "UTF-8"); ?>">

                    <div class="card-body">

                        <h2>
                            <?php echo ($qIndex + 1) . ". " . htmlspecialchars($question["question"] ?? '', ENT_QUOTES, "UTF-8"); ?>
                        </h2>

                        <div class="list-group mt-2">
                            <?php foreach (($question["options"] ?? []) as $oIndex => $option): ?>
                                <button
                                    type="button"
                                    class="btn btn-outline-primary option-btn"
                                    data-index="<?php echo $oIndex; ?>"
                                    data-answer="<?php echo $question["answer"] ?? 0; ?>"
                                    onclick="selectAnswer(this)">
                                    <?php echo htmlspecialchars($option, ENT_QUOTES, "UTF-8"); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <div id="feedback-<?php echo $qIndex; ?>" class="mt-2"></div>
                        <div id="explanation-<?php echo $qIndex; ?>" class="mt-1"></div>

                    </div>
                </div>

            <?php endforeach; ?>

            <div class = "text-center mb-4">

                <button id = "submitQuiz" class="btn btn-primary" onclick="submitQuiz()" style="display:none;">
                    Submit
                </button>

            </div>

            <div id = "quizResult" class = "container mt-4" style = "display:none;">

                <h3>Your Results</h3>
                <p>Score: <span id= "resultScore"></span></p>
                <p>Percentage: <span id = "resultPercentage"></span></p>
                <p id = "resultMessage"></p>

            </div>

            <div class = "text-center mb-4">

                <button class = "btn btn-secondary" onclick = "changeQuestion(-1)">Previous</button>

                <button class = "btn btn-secondary" onclick = "changeQuestion(1)">Next</button>
            </div>

        </div>

    </body>

</html>



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
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/quiz.js"></script>