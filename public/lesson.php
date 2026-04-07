<link rel="stylesheet" href="css/bootstrap.min.css">

<?php
$title = "";
$cards = [];

require "../app/controllers/LessonController.php";

$totalCards = count($cards);
if ($totalCards < 1) {
    $totalCards = 1;
}
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-1">
        <span>Lesson Progress</span>
        <span id="lessonProgressText">1/<?php echo $totalCards; ?></span>
    </div>

    <div class="progress" style="height: 20px;">
        <div
            id="lessonProgressBar"
            class="progress-bar bg-primary"
            role="progressbar"
            style="width: <?php echo 100 / $totalCards; ?>%;"
            aria-valuenow="1"
            aria-valuemin="1"
            aria-valuemax="<?php echo $totalCards; ?>">
        </div>
    </div>

    <h1 class="display-3 mt-5"><?php echo htmlspecialchars($title); ?></h1>

    <p id="cardCounter" class="mb-3"></p>

    <div id="cards">
        <?php foreach ($cards as $card): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($card['title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($card['content']); ?></p>
                    <p class="card-text">
                        <strong>Example:</strong>
                        <?php echo htmlspecialchars($card['example']); ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <button type="button" class="btn btn-secondary" onclick="changeCard(-1)">Previous</button>
        <button type="button" class="btn btn-primary" onclick="changeCard(1)">Next</button>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/lesson.card.js"></script>