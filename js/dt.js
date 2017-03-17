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
  var quiz = loadQuiz();
  var yesNo = loadYesNo();
  yesNo.positive = 0;
  yesNo.negative = 0;
  var feedback = loadFeedback();
  feedback.positive = 0;
  feedback.negative = 0;
  
  // use an eventlistener for the event
  $('#quizStart').hide();
  $('#submitNamePQ').on('click', getUserNamePQ);

  $('#posVote').on('click', function() {
    yesNo.positive++;
    saveYesNo(yesNo);
    $.post('/api/startsession.php', {posVote: yesNo.positive, negVote: yesNo.negative},
      function(data) {
        alert(data);
      });
    location.replace('index.html');
  }); 

  $('#negVote').on('click', function() {
    yesNo.negative++;
    saveYesNo(yesNo);
    $.post('/api/startsession.php', {posVote: yesNo.positive, negVote: yesNo.negative},
      function(data) {
        alert(data);
      });
    location.replace('index.html');
  });

  $('#goodVote').on('click', function() {
    feedback.positive++;
    saveFeedback(feedback);
    $.post('/api/feedback.php', {goodVote: feedback.positive, badVote: feedback.negative},
      function(data) {
        alert(data);
      });
    location.replace('index.html');
  }); 

  $('#badVote').on('click', function() {
    feedback.negative++;
    saveFeedback(feedback);
    $.post('/api/feedback.php', {goodVote: feedback.positive, badVote: feedback.negative},
      function(data) {
        alert(data);
      });
    location.replace('index.html');
  });

  $('#submitQA').on('click', function(e) {
    e.preventDefault();
    var qa = loadQA();
    if ($('#questionQA').val() == "") {
      alert("Please enter a question!");
      return(false);
    }
    else {
      qa.nameQA = $('#nameQA').val();
      qa.questionQA = $('#questionQA').val();
      saveQA(qa);
      $.post('/api/questions.php', {nameQA: qa.nameQA, questionQA: qa.questionQA},
        function(data) {
          alert(data);
        });
      $('#questionQA').val('');
    };
  });

  $('#startPQ').on('click', function() {
    quiz.StartTime = $.now();
    quiz.score = 0;
    saveQuiz(quiz);
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
      $('#namePQForm').hide();
      $(this).parents('section').eq(0).next('section').show(1500);
      $('#namePQ').val('');
    }
    saveQuiz(quiz);
  }

  function saveQuiz(quiz) {
    localStorage.quiz = JSON.stringify(quiz);
  }

  function loadQuiz() {
    return (localStorage.quiz && JSON.parse(localStorage.quiz)) || {};
  }

  function saveYesNo(yesNo) {
    localStorage.yesNo = JSON.stringify(yesNo);
  }

  function loadYesNo() {
    return (localStorage.yesNo && JSON.parse(localStorage.yesNo)) || {};
  }

  function saveFeedback(feedback) {
    localStorage.feedback = JSON.stringify(feedback);
  }

  function loadFeedback() {
    return (localStorage.feedback && JSON.parse(localStorage.feedback)) || {};
  }

  function saveQA(qa) {
    localStorage.qa = JSON.stringify(qa);
  }

  function loadQA() {
    return (localStorage.qa && JSON.parse(localStorage.qa)) || {};
  }

  $.getJSON('/quiz/pqQuestions.json', function(data) {

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
        quiz.EndTime = $.now();
        quiz.quizTime = (quiz.EndTime - quiz.StartTime) / 1000;
        displaySummary();
      } else {
        displayQuestion();
      }
    saveQuiz (quiz);
    }
  }

  function displaySummary () {

    $('#option1, #option2, #option3').addClass("hidden");
    $('#resultText').removeClass("hidden");
    $questionHeader.text('Dein Ergebnis ' + quiz.namePQ + ':');
    $questionText.text('Deine Zeit: ' + quiz.quizTime + ' s');
    $resultText.text('Richtige Antworten: ' + quiz.score);
    $.post('/api/pubquiz.php', {namePQ: quiz.namePQ, timePQ: quiz.quizTime, scorePQ: quiz.score},
      function(data) {
        alert(data);
      });
  }

});