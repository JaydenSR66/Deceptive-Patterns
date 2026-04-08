const cards = document.querySelectorAll('#cards .card');
const counter = document.getElementById('cardCounter');

// PROGRESS BAR (Lessons)
const progressText = document.getElementById('lessonProgressText');
const progressBar = document.getElementById('lessonProgressBar');

// Load the saved progress from local storage.
let currentCard = parseInt(localStorage.getItem('lessonProgress')) || 0;

function showCard(index)
{
    // Hide all cards.
    cards.forEach(card => card.style.display = 'none');

    // Show the current card.
    cards[index].style.display = 'block';

    // Update the counter.
    counter.textContent = `Lesson ${index + 1} of ${cards.length}`;


    // UPDATE PROGRESS BAR
    if (progressText) {
        progressText.textContent = `${index + 1}/${cards.length}`;
    }

    if (progressBar) {
        const percent = ((index + 1) / cards.length) * 100;
        progressBar.style.width = `${percent}%`;
    }

    // Save the current progress to local storage.
    localStorage.setItem('lessonProgress', index);
}

function changeCard(direction)
{
    currentCard += direction;

    if (currentCard < 0) currentCard = 0;
    if (currentCard >= cards.length) currentCard = cards.length - 1;

    showCard(currentCard);
}

// Display the card the user was last on.
showCard(currentCard);