$(function() {

  var questionNumber = 0;
  var questionBank = [];
  var numberOfQuestions;
  var $option1 = $('#option1');
  var $option2 = $('#option2');
  var $option3 = $('#option3');
  var $questionHeader = $('#questionHeader');
  var $questionText = $('#questionText');
  var $resultText = $('#resultText');  
  var questionOrder;
  var quiz = load();
  
  // use an eventlistener for the event
  $('#submitNamePQ').on('click', getUserNamePQ);
  $('#quizStart').hide();
  
  $('#posVote, #negVote').on('click', function() {
    alert("Your vote has been counted!");
    location.replace('index.html');
  });

  $('#submitQA').on('click', function() {
    alert("Your question has been submitted!");
    $('#nameQA').val('');
    $('#questionQA').val('');
    location.replace('index.html');
  });

  $('#startPQ').on('click', function() {
    quiz.EndTime = new Date().getTime();
    quiz.score = 0;
    $('#questionQA').val('');
    location.replace('dt-pubquiz.html');
  });

  function getUserNamePQ(e) {
    e.preventDefault();
    var $nameCheck = $('#nameCheck');
    quiz.namePQ = $('#namePQ').val();

    if (quiz.namePQ.length < 5) {
      $nameCheck.text('Name must contain at least 5 characters');
    } else {
      $nameCheck.text('Your name is: ' + quiz.namePQ);
      $(this).parents('section').eq(0).next('section').show(1500);
      $('#namePQ').val('');
    }
    save(quiz);
  }

  function save(quiz) {
    localStorage.quiz = JSON.stringify(quiz);
  }

  function load() {
    return (localStorage.quiz && JSON.parse(localStorage.quiz)) || {};
  }

  $.getJSON('https://dl.dropboxusercontent.com/u/1163819/pqQuestions.json', function(data) {

    for (i = 0; i < data.quizlist.length; i++) { 
        questionBank[i] = [];
        questionBank[i][0] = data.quizlist[i].header;
        questionBank[i][1] = data.quizlist[i].text;
        questionBank[i][2] = data.quizlist[i].option1;
        questionBank[i][3] = data.quizlist[i].option2;
        questionBank[i][4] = data.quizlist[i].option3;
  }

    numberOfQuestions = questionBank.length;
    displayQuestion();

  }) // getJSON

  function displayQuestion() {

    for (var rnd = [], i = 0; i < 3; i++) {
      rnd.push({i:i, x:Math.random()});
    }

    questionOrder = rnd.sort(function(a, b) {
      return a.x < b.x ? -1 : 1
    }).map(function (item) {
      return item.i
    });

    $questionHeader.text(questionBank[questionNumber][0]);
    $questionText.text(questionBank[questionNumber][1]);
    $option1.text(questionBank[questionNumber][2+questionOrder[0]]);
    $option2.text(questionBank[questionNumber][2+questionOrder[1]]);
    $option3.text(questionBank[questionNumber][2+questionOrder[2]]);

  }

  $option1.on('click', createHandler(1));
  $option2.on('click', createHandler(2));
  $option3.on('click', createHandler(3));

  function createHandler(no) {
    return function () {
      if (questionOrder.indexOf(0) === no - 1) {
        quiz.score++;
      } else {};

      questionNumber++;

      if (questionNumber === numberOfQuestions) {
        quiz.EndTime = new Date().getTime();
        quiz.quizTime = (quiz.EndTime - quiz.StartTime) / 1000;
        displaySummary();
      } else {
        displayQuestion();
      }
    save (quiz);
    }
  }

  function displaySummary () {

    $('#option1, #option2, #option3').addClass("hidden");
    $('#resultText').removeClass("hidden");
    $questionHeader.text('Dein Ergebnis ' + quiz.namePQ + ':');
    $questionText.text('Deine Zeit: ' + quiz.quizTime + ' s');
    $resultText.text('Richtige Antworten: ' + quiz.score);
  }

});