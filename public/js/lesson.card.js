const cards = document.querySelectorAll('#cards .card');
const counter = document.getElementById('cardCounter');
const progressText = document.getElementById('lessonProgressText');
const progressBar = document.getElementById('lessonProgressBar');

let currentCard = parseInt(localStorage.getItem('lessonProgress')) || 0;

function showCard(index) {
    cards.forEach(card => {
        card.style.display = 'none';
    });

    if (cards.length === 0) {
        return;
    }

    if (index < 0) {
        index = 0;
    }

    if (index >= cards.length) {
        index = cards.length - 1;
    }

    currentCard = index;
    cards[currentCard].style.display = 'block';

    if (counter) {
        counter.textContent = `Lesson ${currentCard + 1} of ${cards.length}`;
    }

    if (progressText) {
        progressText.textContent = `${currentCard + 1}/${cards.length}`;
    }

    if (progressBar) {
        const percent = ((currentCard + 1) / cards.length) * 100;
        progressBar.style.width = `${percent}%`;
        progressBar.setAttribute('aria-valuenow', currentCard + 1);
    }

    localStorage.setItem('lessonProgress', currentCard);
}

function changeCard(direction) {
    showCard(currentCard + direction);
}

showCard(currentCard);