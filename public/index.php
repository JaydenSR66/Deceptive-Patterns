<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Deceptive Patterns</title>

  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { scroll-behavior: smooth; background-color: #212529; }

    .hero {
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
      opacity: 0;
      transform: scale(0.95);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;

    }

    .hero.visible {
      opacity: 1;
      transform: scale(1);
    }

    
    .hero-1 { background: linear-gradient(120deg, #0d6efd, #6610f2); }
    .hero-2 { background: linear-gradient(120deg, #198754, #20c997); margin-top: 200px;}
    .hero-3 { background: linear-gradient(120deg, #dc3545, #a82b05); margin-top: 200px;}

    .hero.visible {
      opacity: 1;
      transform: scale(1);
    }

    .py-5 {
        margin-top: 200px
    }

    .footer {
        margin-top: 200px
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark border border-secondary sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Deceptive Patterns Info</a>
  </div>
</nav>

<section class="hero hero-1">
  <div>
    <h1 class="display-4">Deceptive Patterns affect web users like you.</h1>
    <p class="lead">Web users all around the world are being defrauded by predatory design practices. Learn how to protect yourself below:</p>
  </div>
</section>

<section class="py-5 text-light bg-dark text-center">
  <div class="container">
    <h2>What are Deceptive Patterns?</h2><br>
    <p>The notion of deceptive patterns  was first introduced to describe interface elements on, typically, e-commerce sites that
        induce users to do things that they may not want to do, such as signing up for newsletters or
        purchasing products or services. The purpose of this project is to create a web app to effectively
        flag up to e-commerce users that they are about to be manipulated to do something against their
        preferences.
    </p>
  </div>
</section>

<section class="hero hero-2">
  <div class="container">
    <h1 class="display-4">Learn to protect yourself with better browsing habits.</h1>
    <p class="lead">Protecting yourself against deceptive patterns requires being able to acknowlege when they're used by sites.</p>
  </div>
</section>

<section class="py-5 text-light bg-dark text-center">
  <div class="container">
    <h2>Understanding how to avoid Deceptive Patterns</h2><br>
    <p>The following section will describe 6 commonly used deceptive patterns, how they work to manipulate
        people, and also provide some training on how to spot and avoid them. Deceptive patterns take many forms, with examples including 
        setting of cookie preferences, or sneaking-into-basket scenarios. The key to success is to keep in mind that e-commerce sites may not have your best interest at heart.
    </p>
  </div>
</section>

<section class="pb-5 text-center">
  <div class="container">
    <a href="lesson.php" class="btn btn-primary btn-lg">Learn More</a>
  </div>
</section>

<section class="hero hero-3">
  <div>
    <h1 class="display-4">Quiz Yourself</h1>
    <p class="lead">Test your knowledge of Deceptive Patterns below.</p>
  </div>
</section>

<section class="py-5 text-light bg-dark text-center">
  <div class="container">
    <h2>Test your knowledge</h2><br>
    <p>Below will lead you to a section with a quiz which will test your knowledge of deceptive patterns.
        Try it with your friends, and see who can get the highest score! Learning how to keep safe online can still be fun.
     </p>
  </div>
</section>

<section class="pb-5 text-center">
  <div class="container">
    <a href="quiz.php" class="btn btn-primary btn-lg">Try Quiz</a>
  </div>
</section>

<footer class="border border-secondary text-light text-center" style="margin-top: 200px;">
    <div class="container">
        <br><p>2026 Abertay University</p>
  </div>
</footer>

<script src="/js/bootstrap.bundle.min.js"></script>

<script>
//Animate heroes 
const heroes = document.querySelectorAll('.hero');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.3 });

heroes.forEach(hero => observer.observe(hero));
</script>

</body>
</html>
