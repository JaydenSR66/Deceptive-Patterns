const questions = document.querySelectorAll('#questions .card');
const counter = document.getElementById('questionCounter');

// Load saved progress from localStorage.
let currentQuestion = parseInt(localStorage.getItem('quizProgress')) || 0;

//Tracks teh answer for every question
const userAnswers = {};

function showQuestion(index)
{
    // Hide all questions.
    questions.forEach(question => question.style.display = 'none');

    // Show the current question.
    questions[index].style.display = 'block';

    // Update the counter.
    counter.textContent = `Question ${index + 1} of ${questions.length}`;

    // Save progress to localStorage.
    localStorage.setItem('quizProgress', index);
}

function changeQuestion(direction)
{
    currentQuestion += direction;

    if (currentQuestion < 0) currentQuestion = 0;
    if (currentQuestion >= questions.length) currentQuestion = questions.length - 1;

    showQuestion(currentQuestion);
}

function selectAnswer(button)
{
    const selected = parseInt(button.dataset.index);
    const answer = parseInt(button.dataset.answer);
    const feedback = document.getElementById(`feedback-${currentQuestion}`);
    const explanation = document.getElementById(`explanation-${currentQuestion}`);
    const explanationText = button.closest('.card').dataset.explanation;

    // Disable all option buttons after user answers.
    const buttons = button.closest('.card').querySelectorAll('.option-btn');
    buttons.forEach(btn => btn.disabled = true);

    // If the user selected the correct answer, display correct message.
    if (selected === answer)
    {
        button.classList.replace('btn-outline-primary', 'btn-success');
        feedback.textContent = 'Correct!';
        feedback.classList.add('text-success');
    }

    // If user selected the incorrect answer, display incorrect message.
    else
    {
        button.classList.replace('btn-outline-primary', 'btn-danger');
        feedback.textContent = 'Incorrect!';
        feedback.classList.add('text-danger');

        // Show explanation back to the user.
        explanation.textContent = explanationText;
        explanation.classList.add('text-secondary');

        // Highlight the correct answer.
        buttons[answer].classList.replace('btn-outline-primary', 'btn-success');
    }
}

async function submitQuiz(){

    const submitBtn = document.getElementById('submitQuiz');
    

}

function displayResult(result){

}
// Display the question the user was last on.
showQuestion(currentQuestion);