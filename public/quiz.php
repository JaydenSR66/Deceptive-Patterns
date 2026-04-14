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
        <div class="container-fluid py-3 px-4">

            <div class="container d-flex justify-content-center mt-3">

                <div class="w-100" style="max-width: 900px;">

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

            </div>

        </div>

        <!-- Quiz Section -->
        <div class="container d-flex justify-content-center mt-4">

            <div id="questions" class="w-100" style="max-width: 900px;">

                <?php foreach ($questions as $qIndex => $question): ?>

                    <div

                        class="card shadow-lg border-0 rounded-4 mb-4"

                        data-question-index="<?php echo $qIndex; ?>"

                        data-explanation="<?php echo htmlspecialchars($question["explanation"] ?? '', ENT_QUOTES, "UTF-8"); ?>">

                        <div class="card-body p-5">

                            <!-- Question -->
                            <h1 class="text-center fw-bold mb-5">

                                <?php echo htmlspecialchars($question["question"] ?? '', ENT_QUOTES, "UTF-8"); ?>

                            </h1>

                            <!-- Options -->
                            <div class="list-group rounded-4 overflow-hidden">

                                <?php foreach (($question["options"] ?? []) as $oIndex => $option): ?>

                                    <button

                                        type="button"
                                        class="list-group-item list-group-item-action py-4 fs-4 option-btn"
                                        data-index="<?php echo $oIndex; ?>"
                                        data-answer="<?php echo $question["answer"] ?? 0; ?>"
                                        onclick="selectAnswer(this)">

                                        <div class="d-flex align-items-center">

                                            <input

                                                class="form-check-input me-3"
                                                type="radio"
                                                name="question_<?php echo $qIndex; ?>"
                                                disabled>

                                            <span>

                                                <?php echo htmlspecialchars($option, ENT_QUOTES, "UTF-8"); ?>

                                            </span>

                                        </div>

                                    </button>

                                <?php endforeach; ?>

                            </div>

                            <!-- Feedback -->
                            <div id="feedback-<?php echo $qIndex; ?>" class="mt-3"></div>
                            <div id="explanation-<?php echo $qIndex; ?>" class="mt-2"></div>

                            <!-- Footer Buttons -->
                            <div class="d-flex justify-content-between align-items-center mt-4">

                                <button

                                    class="btn btn-link text-secondary fs-4 text-decoration-none"

                                    onclick="changeQuestion(-1)">

                                    <- Previous

                                </button>

                                <button

                                    class="btn btn-link text-secondary fs-4 text-decoration-none"

                                    onclick="changeQuestion(1)">

                                    Next ->

                                </button>



                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

                <div class = "text-center mt-4">

                    <button
                        id="submitQuiz"
                        class="btn btn-primary px-5 py-2 fs-5 rounded-3 shadow-sm"
                        onclick="submitQuiz()"
                        style = "display: none;">
                        Submit
                    </button>

                </div>

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