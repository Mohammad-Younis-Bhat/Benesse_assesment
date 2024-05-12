
<?php
require_once('config.php');
require_once('dbConfig.php');
$db = dbConnect::getConnection($config['db_server'],$config['db_username'],$config['db_password'],$config['db']);
require_once('controller/quizeController.php');
$QuizeDashboard = new quizeController($db);
$questionSet = $QuizeDashboard->getQuestions(5);

 
?>

<br/>
<div class="d-flex justify-content-center align-items-center">
  <div class="container-fluid">
    
  <?php
    if(count($questionSet)>0){
  ?>
<form id="quizeForm">
  <?php
      $count = 1;
      foreach ($questionSet as $question) {
  ?>
  <p class="d-inline-flex gap-1">
      <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Question <?php echo $count++; ?>
      </a>
    </p>
    <div class="collapse show" id="collapseExample">
      <div class="card card-body">
        <?php echo $question['Question_Text']; ?>

        <div class="form-check">
        <input class="form-check-input" type="radio" name="q<?php echo $count-1; ?>" id="q1_<?php echo $count-1; ?>" value="A" onclick="handleAnswers('<?php echo $question['Question_Id']; ?>', 'A', 'q1_<?php echo $count-1; ?>');"/>
        <label class="form-check-label" for="q1_r1">
          <?php echo $question['Option_A']; ?>
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="q<?php echo $count-1; ?>" id="q1_<?php echo $count-1; ?>" value="B" onclick="handleAnswers('<?php echo $question['Question_Id']; ?>', 'B', 'q1_<?php echo $count-1; ?>');">
        <label class="form-check-label" for="q1_r2">
          <?php echo $question['Option_B']; ?>
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="q<?php echo $count-1; ?>" id="q1_<?php echo $count-1; ?>" value="C" onclick="handleAnswers('<?php echo $question['Question_Id']; ?>', 'C', 'q1_<?php echo $count-1; ?>');">
        <label class="form-check-label" for="q1_r3">
          <?php echo $question['Option_C']; ?>
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="q<?php echo $count-1; ?>" id="q1_<?php echo $count-1; ?>" value="D" onclick="handleAnswers('<?php echo $question['Question_Id']; ?>', 'D', 'q1_<?php echo $count-1; ?>');">
        <label class="form-check-label" for="q1_r4">
          <?php echo $question['Option_D']; ?>
        </label>
      </div>
      </div>
    </div>

    
    <?php
      } //foreachClose
      ?>
      <br/>
      <div class="row">
      <div class = "col-md-4">
        <button type="submit" id="submitBtn" disabled = "true" class="btn btn-md btn-primary">Submit Quize</button>
      </div>
    </div>
    </form>
    <div id="scoreCardContainer"></div>
      <?php
    }else{
      ?>
      <label>Np Questions To Show</label>
      <?php
    }
    ?>

  </div>
</div>
<br/>
<script >
  var answersArray = [];
  var totalRadioButtons =  $('input[type="radio"]').length / 4;
  var clickedRadioButtons = 0;

  function handleAnswers(q_id,opt,q_serial) {
    var answerObj = {
        questionId: q_id,
        answer: opt,
        q_serial: q_serial
    };
    answersArray.push(answerObj);
    clickedRadioButtons++;
    if (clickedRadioButtons === totalRadioButtons) {
        $('#submitBtn').prop('disabled', false); 
    }
    console.log(totalRadioButtons);
  }

  function saveAnswer(){
    event.preventDefault();
    $.ajax({
      url: "Actions/save_answers.php",
        method: 'POST',
        data: {
            answerData: answersArray
        },
        success: function(response) {
          console.log("Response = ", JSON.parse(response));
          displayScoreCard(JSON.parse(response));
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
  }

  function displayScoreCard(scoreCard) {
    var scoreCardContainer = document.getElementById('scoreCardContainer');
    scoreCardContainer.innerHTML = ''; // Clear previous content
    
    // Sort the score card by serial_id
    var sortedScoreCard = Object.values(scoreCard).sort((a, b) => {
        var serialA = parseInt(a.serial_id.split('_')[1]);
        var serialB = parseInt(b.serial_id.split('_')[1]);
        return serialA - serialB;
    });
    
    // Create a Bootstrap row
    var row = document.createElement('div');
    row.classList.add('row');
    let count = 1;
    // Iterate through the sorted score card
    sortedScoreCard.forEach(function(score) {
        // Create Bootstrap card for each score entry
        var card = document.createElement('div');
        card.classList.add('card', 'mb-3', 'col');
        
        var cardBody = document.createElement('div');
        cardBody.classList.add('card-body');
        
        // Assign color based on the result
        var textColorClass = score.result === 'correct' ? 'text-success' : 'text-danger';
        
        cardBody.innerHTML =  '<h5 class="card-title">Question : ' + count++ + '</h5>' +
                              '<p class="card-text ' + textColorClass + '">Result: ' + score.result + '</p>';
        
        card.appendChild(cardBody);
        row.appendChild(card);
    });
    
    scoreCardContainer.appendChild(row);
}

  $(document).ready(function(){
    $('#quizeForm').submit(saveAnswer);
  });

</script>