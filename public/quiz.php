<?php
// Initialise variables before loading the controller to avoid undefined variable warnings.
$title = "";
$questions = [];

// Load the quiz controller which populates $title and $questions.
require "../app/controllers/QuizController.php";
?>

<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel = 'stylesheet' integrity = 'sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin = 'anonymous'>
        <title>Deceptive Patterns Quiz</title>
    </head>

    <body class = "bg-light">

        <!-- Progress Bar -->
        <div class="container mt-3">

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
        <div class = "card shadow-sm mx-auto" style="max-width: 600px;">

            <div class = "card-body">

                <!-- Question Title-->
                <h2 class = "text-center mb-4" id = "questionText">
                    <?php echo htmlspecialchars($title); ?>
                </h2>

                <!-- Question -->
                <?php foreach ($questions as $qIndex => $question): ?>

                    <div class = "mb-4">

                        <h3>
                            <?php echo ($qIndex +1) . ". " . htmlspecialchars($question["question"]); ?>
                        </h3>

                        <!-- Options -->
                        <div class = "list-group mt-2">
                            
                            <?php foreach ($question['options'] as $oIndex => $option): ?>

                                <label class = "list-group-item d-flex align-items-center">

                                    <input
                                        class = "form-check-input me-2"
                                        type = "radio"
                                        name = "question_<?php echo $qIndex; ?>"
                                        value = "<?php echo $oIndex; ?>">

                                    <?php echo htmlspecialchars($option); ?>

                                </label>

                            <?php endforeach; ?>

                        </div>

                    </div>

                <?php endforeach; ?>

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
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/quiz.js"></script>