<?php
require 'connection.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM registration  WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Профориентация тест</title>
        <link rel="stylesheet" href="quiz.css" >
    </head>
  
    <body>
        <h1 class="h1">COURSDU Quiz: Помогаем выбрать направление, которое подходит именно вам!</h1>
        <h2 class="blinking">Добро пожаловать <?php echo $row["username"]; ?></h2> 
   
        <div class="quiz-container">
          <div id="quiz"></div>
        </div>
        <button id="previous">Назад</button>
        <button id="next">Далее</button>
        <button id="submit">Отправить</button>
        <div id="results"></div>
        <a class="logout" href="logout.php">Выйти</a>
 
        
        <script>
        (function(){
  function buildQuiz(){
    const output = [];
    myQuestions.forEach(
      (currentQuestion, questionNumber) => {
        const answers = [];
        for(letter in currentQuestion.answers){
          answers.push(
            `<label>
              <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
            </label>`
          );
        }
        output.push(
          `<div class="slide">
            <div class="question"> ${currentQuestion.question} </div>
            <div class="answers"> ${answers.join("")} </div>
          </div>`
        );
      }
    );
    quizContainer.innerHTML = output.join('');
  }

  function showResults(){
    resultsContainer.innerHTML = `Спасибо за участие,Мы отправляем  результаты на вашу электронный почту`;
  }

  function showSlide(n) {
    slides[currentSlide].classList.remove('active-slide');
    slides[n].classList.add('active-slide');
    currentSlide = n;
    if(currentSlide === 0){
      previousButton.style.display = 'none';
    }
    else{
      previousButton.style.display = 'inline-block';
    }
    if(currentSlide === slides.length-1){
      nextButton.style.display = 'none';
      submitButton.style.display = 'inline-block';
    }
    else{
      nextButton.style.display = 'inline-block';
      submitButton.style.display = 'none';
    }
  }

  function showNextSlide() {
    showSlide(currentSlide + 1);
  }

  function showPreviousSlide() {
    showSlide(currentSlide - 1);
  }
  const quizContainer = document.getElementById('quiz');
  const resultsContainer = document.getElementById('results');
  const submitButton = document.getElementById('submit');
  const myQuestions = [
    {
      question: "Какую цель вы перед собой ставите:",
      answers: {
        a: "Получить новую профессию",
        b: "Развить управленческие навыки",
        c: "Саморазвитие для себя",
        d:  "Другая цель"
      },
    },
    {
      question: "Мне больше подходит:",
      answers: {
        a: "Делать свою работу независимо от других людей",
        b: "Работать в команде, в сотрудничестве с другими людьми",
        c: "Управлять людьми, организовывать их работу"
      }
    },
    {
      question: "В свободное время я предпочту:",
      answers: {
        a: "Играть в компьютерные игры",
        b: "Мастерить что-то красивое или полезное",
        c: "Общаться в соцсетях (писать посты, размещать фото)",
        d: "Читать книги"
      }
    },
    {
      question: "Я лучше воспринимаю и запоминаю информацию:",
      answers: {
        a: "На слух",
        b: "С помощью картинок и образов",
        c: "Мне нужно понять логику, разобраться"
      }
    },
    {
      question: "Мне больше нравится:",
      answers: {
        a: "Где нужно поразмышлять,и решать задачи",
        b: "Исследовать, анализировать,раскладывать по полочкам",
        с: "Придумывать что-то новое, экспериментировать"
      }
    },
    {
      question: "Для меня проще и приятнее:",
      answers: {
        a: "Разобраться, как работает компьютерная программа",
        b: "Написать текст или документ",
        c: "Составить бюджет или финансовый отчет",
        d: "сделать что-то своими руками"
      }
    },
    {
      question: "Я в большей степени интересуюсь:",
      answers: {
        a: "Всем, что связано с компьютерами",
        b: "Творчеством, искусством",
        c: "Рекламой, маркетингом, бизнесом"
      }
    },
    {
      question: "Для меня более комфортно:",
      answers: {
        a: "Концентрироваться на одном деле, не отвлекаясь",
        b: "Переключаться на разные задачи, чтобы не заскучать",
        c: "Делать несколько дел одновременно"
      }
    }
    
  ];
  buildQuiz();
  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;
  showSlide(currentSlide);
  submitButton.addEventListener('click', showResults);
  previousButton.addEventListener("click", showPreviousSlide);
  nextButton.addEventListener("click", showNextSlide);
})();
        </script>
    </body>
</html>