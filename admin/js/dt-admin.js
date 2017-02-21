$(function() {

  $('#resultSeparator').hide();
  $('#resultYesNo').hide();
  $('#resultQuestions').hide();
  $('#resultPQ').hide();

  $('#getQuestions').on('click', function() {
    $('#resultYesNo').hide();
    $('#resultPQ').hide();
    $.get('/api/query_questions.php', function(dataQuestions) {
      var questions = JSON.parse(dataQuestions);
      $('#questionsTable').DataTable( {
        data: questions,
        columns: [
          {"data": "id"},
          {"data": "nameQA"},
          {"data": "questionQA"},
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
    });
    $('#resultSeparator').show(1500);
    $('#resultQuestions').show(1500);
  });

  $('#getResultYesNo').on('click', function() {
    $('#resultQuestions').hide();
    $('#resultPQ').hide();
    $.get('/api/query_startsession.php', function(dataStart) {
      var votes = JSON.parse(dataStart);
      var posVotes = parseInt(votes["0"]["SUM(posVote)"]);
      var negVotes = parseInt(votes["0"]["SUM(negVote)"]);
      var totalVotes = posVotes + negVotes;
      var posPercentage = Math.round((posVotes / totalVotes)*100);
      var negPercentage = Math.round((negVotes / totalVotes)*100);
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
    $.get('/api/query_pubquiz.php', function(dataPQ) {
      var scorePQ = JSON.parse(dataPQ);
      $('#pqTable').DataTable( {
        data: scorePQ,
        columns: [
          {"data": "id"},
          {"data": "namePQ"},
          {"data": "scorePQ"},
          {"data": "timePQ"},
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
    });
    $('#resultSeparator').show(1500);
    $('#resultPQ').show(1500);
  });

}); 