const cards = document.querySelectorAll('#cards .card');
const counter = document.getElementById('cardCounter');

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