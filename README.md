# CMP308 — Deceptive Patterns Quiz

Built as a group project for Abertay University (2026), this web application was developed across two modules, CMP308 Professional Project Planning and Prototyping and CMP311 Professional Project Development and Delivery. The site introduces users to deceptive design patterns through an interactive lesson, then challenges them with a multiple choice quiz to test their understanding.

## Features

- **Lesson module** — Swipe through a series of cards that explain common deceptive patterns, each with a description and real-world example.
- **Quiz module** — Answer multiple choice questions to test what you've learned. Incorrect answers reveal the correct option and a written explanation.
- **Progress saving** — Your position in both the lesson and the quiz is saved automatically using `localStorage`, so you can pick up where you left off.

## Project Structure
```
CMP308/
├── app/
│   ├── controllers/
│   │   ├── LessonController.php   # Loads the lesson data
│   │   └── QuizController.php     # Loads the quiz question data
│   └── data/
│       ├── lessons.json           # Lesson content
│       └── quiz.json              # Quiz questions, options, and answers
├── public/
│   ├── css/
│   │   └── bootstrap.min.css
│   ├── js/
│   │   ├── bootstrap.bundle.min.js
│   │   ├── lesson.card.js         # Lesson navigation logic
│   │   └── quiz.js                # Quiz logic and answer feedback
│   ├── index.php                  # Home page
│   ├── lesson.php                 # Lesson view
│   └── quiz.php                   # Quiz view
├── .gitignore
└── README.md
```

## Data Format

### Lesson cards (`data/lesson.json`)
```json
{
  "title": "Introduction to Deceptive Patterns",
  "cards": [
    {
      "id": 1,
      "title": "Card title",
      "content": "Explanation of the pattern.",
      "example": "A real-world example of this pattern."
    }
  ]
}
```

### Quiz questions (`data/quiz.json`)
```json
{
  "title": "Deceptive Patterns Quiz",
  "description": "Test your knowledge of deceptive design patterns",
  "questions": [
    {
      "question": "Question text?",
      "options": ["A", "B", "C", "D"],
      "answer": 0,
      "explanation": "Why the correct answer is correct."
    }
  ]
}
```
The `answer` field is the zero-based index of the correct option in the `options` array.

## Getting Started

### Requirements
- PHP 8+
- A local server such as [XAMPP](https://www.apachefriends.org/), [WAMP](https://www.wampserver.com/), or the PHP built-in server

### Running locally

**Using the PHP built-in server:**
```bash
cd CMP308/public
php -S localhost:8000
```
Then open [http://localhost:8000](http://localhost:8000) in your browser.

**Using XAMPP/WAMP:**  
Place the `CMP308` folder in your server's web root (`htdocs` or `www`) and navigate to `http://localhost/CMP308/public`.

## Technologies Used

- PHP
- HTML / CSS / JavaScript
- Bootstrap 5
- localStorage (client-side progress persistence)

## Team

[Jayden Robertson](www.linkedin.com/in/jayden-robertson-72b206326), [Filip Shchedryvyi](https://www.linkedin.com/in/filip-shchedryvyi/), Connor Strachan, Jude Sommerville, Sebi Rascanu & Ishan Gimhana Punchihewa 