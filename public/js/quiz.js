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

    // Show or hide the Submit button on  last question
    const submitBtn = document.getElementById('submitQuiz');
    if (submitBtn) 
    {
        submitBtn.style.display = (index === questions.length - 1) ? 'inline-block' : 'none';
    }
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

    //record the usser answer for the question
    userAnswers[currentQuestion] = selected;

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
    if (submitBtn) submitBtn.disabled = true;
 
    try 
    {
        const response = await fetch('/quiz_submit.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ answers: userAnswers }),
        });
 
        if (!response.ok) throw new Error(`Server error: ${response.status}`);
 
        const result = await response.json();
 
        // Clear saved progress now quiz is complete
        localStorage.removeItem('quizProgress');
 
        // Pass score data to the result section for display 
        displayResult(result);
 
    } catch (err) {
        console.error('Quiz submission failed:', err);
        if (submitBtn) submitBtn.disabled = false;
    }


}

function displayResult(result){
    const resultSection = document.getElementById('quizResult');
    
    if (!resultSection) return;
 
    // Hide the questions show the result section
    document.getElementById('questions').style.display = 'none';
    resultSection.style.display = 'block';
 
    // Populate data attributes so the frontend can read them
    resultSection.dataset.score      = result.score;
    resultSection.dataset.total      = result.total;
    resultSection.dataset.percentage = result.percentage;
    resultSection.dataset.band       = result.band;
 
    // Populate text content elements if they exist in the HTML
    const scoreEl      = document.getElementById('resultScore');
    const percentageEl = document.getElementById('resultPercentage');
    const messageEl    = document.getElementById('resultMessage');
 
    if (scoreEl)      scoreEl.textContent      = `${result.score} / ${result.total}`;
    if (percentageEl) percentageEl.textContent  = `${result.percentage}%`;
    if (messageEl) {
        const messages = 
        {
            success: 'Great work! You have a solid understanding of deceptive patterns.',
            warning: 'Good effort! Review the explanations to strengthen your knowledge.',
            danger:  'Keep learning! Go back through the lessons and try again.',
        };
        messageEl.textContent = messages[result.band] || '';
    }
}
// Display the question the user was last on.
showQuestion(currentQuestion);