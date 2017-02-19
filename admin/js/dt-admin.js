$(function() {

  $('#resultSeparator').hide();
  $('#resultYesNo').hide();
  $('#resultQuestions').hide();
  $('#resultPQ').hide();

  $('#getQuestions').on('click', function() {
    var questions = {};
    $('#resultYesNo').hide();
    $('#resultPQ').hide();
    $('#resultSeparator').show(1500);
    $('#resultQuestions').show(1500);
    $.get('/api/query_questions.php', function(dataQuestions) {
      questions = JSON.parse(dataQuestions);
      console.log(questions);
      $('#qestionsTable').DataTable({
        data: questions,
        columns: [
          {data: 'id' },
          {data: 'nameQA' },
          {data: 'questionQA' }
        ]
      });
      console.log(questions);
    });
  });

  $('#getResultYesNo').on('click', function() {
    $('#resultQuestions').hide();
    $('#resultPQ').hide();
    $.get('/api/query_startsession.php', function(dataStart) {
      var votes = JSON.parse(dataStart);
      posVotes = parseInt(votes["0"]["SUM(posVote)"]);
      negVotes = parseInt(votes["0"]["SUM(negVote)"]);
      totalVotes = posVotes + negVotes;
      posPercentage = Math.round((posVotes / totalVotes)*100);
      negPercentage = Math.round((negVotes / totalVotes)*100);
      $('#resultYes').text(posPercentage + '%');
      $('#resultNo').text(negPercentage + '%');
      $('#resultYesNoText').text('Anzahl Stimmen: ' + totalVotes);
    });
    $('#resultSeparator').show(1500);
    $('#resultYesNo').show(1500);
  });

  $('#getResultPQ').on('click', function() {
    $('#resultQuestions').hide();
    $('#resultYesNo').hide();
    $('#resultSeparator').show(1500);
    $('#resultPQ').show(1500);
  });

}); 